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
    
    
    //put your code here
}
