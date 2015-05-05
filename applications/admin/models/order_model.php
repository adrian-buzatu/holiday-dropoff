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
                . "SUM(od.`extended`) as `extended`, COUNT(*) as `normal`,"
                . " SUM(od.`price`) as `price`, "
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
            . " WHERE o.`status` = '1' AND o.`date` BETWEEN {$start} AND {$end}"
            . " AND o.`camp_id` = '". $camp_id . "'"
            . " AND o.`date` BETWEEN ". $start . " AND ". $end
            . " GROUP BY o.`id`, od.`child_id`"
            . " ORDER BY o.`date`";
        $query = $this->db->query($sql);
        if($query->num_rows == 0){
            return false;
        }
        return $query->result_array();
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
