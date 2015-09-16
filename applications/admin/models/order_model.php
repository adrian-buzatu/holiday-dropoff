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
class Order_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function get($perPage = 25, $page = 1){
        $sql = "SELECT o.*, c.`first_name`, c.`last_name`"
                . " FROM `order` o"
                . " JOIN `users` c ON (o.`user_id` = c.`id`)"
                . " WHERE o.`status` = 1 ORDER BY o.`date` DESC";
            $query = $this->db->query($sql);
        if($query->num_rows == 0){
            return false;
        }
        return $query->result_array();
    }
    
    public function one($orderId){
        $sql = "SELECT o.*, c.`first_name`, c.`last_name`,"
                . "FROM_UNIXTIME(cm.`start_date`, '%d/%m/%Y') as `start_date`, "
                . "FROM_UNIXTIME(cm.`end_date`, '%d/%m/%Y') as `end_date`, "
                . "cm.`name` as `camp_name`"
                . " FROM `order` o"
                . " JOIN `users` c ON (o.`user_id` = c.`id`)"
                . " JOIN `camps` cm ON (o.`camp_id` = cm.`id`)"
                . " WHERE o.`status` = 1 AND o.`id` = '". $orderId . "' LIMIT 1";
            $query = $this->db->query($sql);
        if($query->num_rows == 0){
            return false;
        }
        $res = $query->result_array();
        return $res[0];
    }
    
    function excel($camp_id, $start = 0, $end = 999999999999999999999999999){
        $start = (int) $start;
        if((int) $end === 0){
            $end = 999999999999999999999999999;
        }
        $sql = "SELECT o.`date`, o.`id`, o.`total`, od.`child_id`, "
                . "IF(od.`extended` = 1, 1, 0) as `extended`, "
                . "IF(od.`extended` = 0, 1, 0) as `normal`,"
                . " od.`price` as `price`, od.`day` as day, od.`friend` as `friend`, "
            . "CONCAT(c.`first_name`, ' ', c.`last_name`) as child, "
            . "CONCAT(u.`first_name`, ' ', u.`last_name`) as parent, "
            . "u.`phone_number` as `number`, "
            . "u.`email` as `email`, "
            . "TIMESTAMPDIFF(YEAR, FROM_UNIXTIME(c.`birthdate`), NOW()) as `age`, "
            . "c.`notes` "
            . " FROM `order_details` od"
            . " JOIN `order` o ON (od.`order_id` = o.`id`)"
            . " LEFT JOIN `children` c ON (od.`child_id` = c.`id`)"
            . " JOIN `users` u ON (o.`user_id` = u.`id`)"
            . " WHERE o.`status` = '1'"
            . " AND o.`camp_id` = '". $camp_id . "'"
            /*. " AND od.`price` > 0 " */
            . " AND od.`day` BETWEEN ". $start . " AND ". $end 
            /*. " GROUP BY od.`child_id`" */
            . " ORDER BY od.`day`, o.`id`";
        $query = $this->db->query($sql);
        if($query->num_rows == 0){
            return false;
        }
        return $query->result_array();
    }
    
    function getOrderDaySubtotal($order_id, $day){
        $sql = "SELECT SUM(`price`) as `subtotal` FROM `order_details`"
                . " WHERE `order_id` = '". $order_id . "' AND `day` = '". $day. "'"
                . " GROUP BY `order_id`";
        $query = $this->db->query($sql);
        if($query->num_rows == 0){
            return 0;
        }
        $res = $query->result_array();
        return $res[0]['subtotal'];
    }
    
    function children($orderId){
        $sql = "SELECT o.*, "
                . "c.`first_name`, "
                . "c.`last_name`, "
                . "GROUP_CONCAT( DISTINCT CONCAT( DAYNAME( FROM_UNIXTIME(`day`) ), '+++', DAY( FROM_UNIXTIME(`day`) )"
                . ", IF(o.`extended` = 1, '(e)', '(n)' ) ) ) as days_booked"
                . " FROM `order_details` o"
                . " JOIN `children` c ON (o.`child_id` = c.`id`)"
                . " WHERE o.`order_id` = '". $orderId . "'"
                . " GROUP BY o.`child_id`";
        $query = $this->db->query($sql);
        if($query->num_rows == 0){
            return false;
        }
        return $query->result_array();
    }
    //put your code here
}
