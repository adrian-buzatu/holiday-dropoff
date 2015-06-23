<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pages_model
 *
 * @author shade
 */
class Booking_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    function addOrder($order){
        $this->db->insert('order', $order);
        return $this->db->insert_id();
    }
    function addOrderDetails($order_details){
        $this->db->insert('order_details', $order_details);
        return $this->db->insert_id();
    }
    function updateOrderDetails($order_details, $where){
        $this->db->update('order_details', $order_details, $where);
        return $this->db->insert_id();
    }
    function updateOrderTotal($orderId, $total){
        $this->db->update('order', array('total' => $total), array('id' => $orderId));
        return true;
    }
    function updateOrderDiscount($orderId, $discount){
        $this->db->update('order', array('discount' => $discount), array('id' => $orderId));
        return true;
    }
    function getChildrenFromOrder($childrenIds){
        $sql = "SELECT * "
                . "FROM `children` c "
                . "WHERE c.`id` IN (". $childrenIds . ")";
        $result = $this->db->query($sql);
        if ($result->num_rows() == 0) {
            return false;
        } else {
            return $result->result_array();
        }
    }
    
    function updateOrder($order_id, $order_array){
        $this->db->update('order', $order_array, array('id' => $order_id));
        return true;
    }
    
    function resetOrderContents($order_id){
        $this->db->delete('order_details', array('order_id' => $order_id));
        return true;
    }
    
    function checkCoupon($code){
        $sql = "SELECT * "
                . "FROM `coupons` c "
                . "WHERE c.`code` = '". $code . "'"
                . "AND c.`start_date` <= ". time()
                . " AND c.`end_date` >= ". time();
        $result = $this->db->query($sql);
        if ($result->num_rows() == 0) {
            return false;
        } else {
            $res = $result->result_array();
            return $res[0];
        }
    }
    
    public function children($orderId){
        $sql = "SELECT o.*, "
                . "c.`first_name`, "
                . "c.`last_name`, "
                . "GROUP_CONCAT(DISTINCT DAYNAME(FROM_UNIXTIME(`day`))) as days_booked"
                . " FROM `order_details` o"
                . " JOIN `users` c ON (o.`child_id` = c.`id`)"
                . " WHERE o.`order_id` = '". $orderId . "'"
                . " GROUP BY o.`child_id`";
        $query = $this->db->query($sql);
        if($query->num_rows == 0){
            return false;
        }
        return $query->result_array();
    }
    
    
    public function get($user_id){
        $sql = "SELECT o.*, c.`first_name`, c.`last_name`,"
                . "FROM_UNIXTIME(cm.`start_date`, '%m/%d/%Y') as `start_date`, "
                . "FROM_UNIXTIME(cm.`end_date`, '%m/%d/%Y') as `end_date`, "
                . "cm.`name` as `camp_name`"
                . " FROM `order` o"
                . " JOIN `users` c ON (o.`user_id` = c.`id`)"
                . " JOIN `camps` cm ON (o.`camp_id` = cm.`id`)"
                . " WHERE o.`status` = 1 AND c.`id` = '". $user_id . "'";
            $query = $this->db->query($sql);
        if($query->num_rows == 0){
            return false;
        }
        $res = $query->result_array();
        return $res;
    }
    
    public function getUserFinalizedBookings($userId, $order_id = 0){
        $where = "";
        if((int)$order_id > 0){
            $where = " AND o.`id` = '". $order_id ."' ";
        }
        $sql = "SELECT o.`total`, o.`discount`, o.`date`, o.`id`,"
                . " od.`friend`, od.`child_id`,"
                . " camp.`name` as `camp`, "
                . " c.`first_name`, "
                . " c.`last_name`, "
                . "TIMESTAMPDIFF(YEAR, FROM_UNIXTIME(c.`birthdate`), NOW()) as `age`, "
                . "c.`notes`, "
                . " CONCAT(c.`first_name`, ' ', c.`last_name`) as `child`"
                . " FROM `order` AS o"
                . " JOIN `order_details` od ON(od.`order_id` = o.`id`)"
                . " LEFT JOIN `children` c ON(od.`child_id` = c.`id`)"
                . " JOIN `camps` camp ON(o.`camp_id` = camp.`id`)"
                . " WHERE o.`user_id` = '". $userId . "' AND o.`status` = 1 "
                . $where
                . " GROUP BY od.`child_id`, o.`id`"
                . " ORDER BY o.`date`"
                . " LIMIT 5";
        $query = $this->db->query($sql);
        if($query->num_rows() === 0){
            return false;
        }
        $result = $query->result_array();
        foreach($result as $loopIndex => $orderItem){
            $result[$loopIndex]['days_booked'] = '';
           if(is_array($this->__formatChildOrderDaysBooked($orderItem['id'], $orderItem['child_id']))){
               $result[$loopIndex]['days_booked'] = implode(", ", 
                       $this->__formatChildOrderDaysBooked($orderItem['id'], $orderItem['child_id']));
           }
        }
        return $result;
    }
    
    public function beenBefore($userId, $maxOrder){
        $sql = "SELECT * FROM `order` "
                . "WHERE `user_id` = '". $userId . "' "
                . "AND `id` < ". $maxOrder. 
                " LIMIT 1";
        $query = $this->db->query($sql);
        if($query->num_rows() === 0){
            return 'No';
        }
        return 'Yes';
    }


    private function __formatDay($day, $extended = false){
        if($extended == false){
            return date("d/m/Y", $day). "(n)";
        } else {
            return date("d/m/Y", $day). "(e)";
        }
    }
    
    private function ___getChildOrderDaysBooked($orderId, $childId){
        $sql = "SELECT od.`day`, od.`extended` FROM `order_details` od"
                . " WHERE od.`order_id` = '". $orderId . "' "
                . "AND od.`child_id` = '". $childId . "'"
                . " ORDER BY od.`day` ASC";
        $query = $this->db->query($sql);
        if($query->num_rows() === 0){
            return false;
        }
        return $query->result_array();        
    }
    
    private function __formatChildOrderDaysBooked($orderId, $childId){
         $daysBooked = array();
        if(!is_array($this->___getChildOrderDaysBooked($orderId, $childId))){
            return false;
        }
        $childDaysBooked = $this->___getChildOrderDaysBooked($orderId, $childId);
        foreach($childDaysBooked as $dayData){
            $daysBooked[] = $this->__formatDay($dayData['day'], $dayData['extended']);
        }
        return $daysBooked;
    }
}
