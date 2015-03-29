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
    function updateOrderTotal($orderId, $total){
        $this->db->update('order', array('total' => $total), array('id' => $orderId));
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
}
