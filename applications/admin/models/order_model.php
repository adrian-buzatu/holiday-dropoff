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
                . " WHERE o.`status` = 1";
            $query = $this->db->query($sql);
        if($query->num_rows == 0){
            return false;
        }
        return $query->result_array();
    }
    
    public function one($orderId){
        $sql = "SELECT o.*, c.`first_name`, c.`last_name`,"
                . "FROM_UNIXTIME(cm.`start_date`, '%m/%d/%Y') as `start_date`, "
                . "FROM_UNIXTIME(cm.`end_date`, '%m/%d/%Y') as `end_date`, "
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
    
    function children($orderId){
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
    //put your code here
}
