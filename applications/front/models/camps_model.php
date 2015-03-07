<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of camp_groups_model
 *
 * @author shade
 */
class Camps_Model  extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    function get(){
        $result = $this->db->get('camps');
        if($result->num_rows() == 0){
            return false;
        }
        return $result->result_array();
    }
    
    
    function one($id){
        $result = $this->db->get_where('camps', array('id' => $id), 1);
        if($result->num_rows() == 0){
            return false;
        }
        $rows = $result->result_array();
        $row = $rows[0];
        $row['prices'] = $this->getCampaignPrices($id);
        return $row;
    }
    
    
    function getCampaignPrices($campId){
        $result = $this->
                db->
                order_by('camp_price_type', 'asc')->
                get_where('camp_prices', array('camp_id' => $campId));
        if($result->num_rows() == 0){
            return false;
        }
        $rows = $result->result_array();
        $output = array();
        $totalPriceRaw = 0;
        foreach($rows as $row){
            $output[trim($row['camp_price_type'])] = $row['price'];
            if($row['camp_price_type'] != 8){
                $totalPriceRaw += $row['price'];
            }
        }
        $output[9] = $totalPriceRaw - $output[8];
        return $output;
    }
    
    function getCampGroupsForForm(){
        $result = $this->db->get('camp_groups');
        if($result->num_rows() == 0){
            return false;
        }
        $campGroups = $result->result_array();
        $output = array();
        foreach ($campGroups as $item){
            $output[$item['id']] = $item['name'];
        }
        return $output;
    }
}
