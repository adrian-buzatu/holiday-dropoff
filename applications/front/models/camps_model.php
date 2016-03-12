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
            if($row['camp_price_type'] != 0){
                $totalPriceRaw += $row['price'];
            }
        }
        $output[-1] = $totalPriceRaw - $output[0];
        $output[-2] = $totalPriceRaw;
        return $output;
    }
    
    function getFullWeekDailyDiscount($campId, $weekNumber){
        $result = $this->
                db->                
                get_where('camp_prices', array('camp_id' => $campId, 'camp_price_type' => $weekNumber - 1));
        if($result->num_rows() == 0){
            return 0;
        }
        $output = $result->result_array();
        return is_numeric($output[0]['daily_discount_for_full_week']) ? $output[0]['daily_discount_for_full_week'] : 0 ;
    }
    
    function getCampaignAvailableDays($campId){
        $sql = "SELECT COUNT(*) `nb_results`, "
                . "WEEK(FROM_UNIXTIME(cp.`camp_price_type`)) as week, "
                . "@curRow := @curRow + 1 AS week_number "
                . "FROM `camp_prices` cp "
                . "JOIN (SELECT @curRow := 0) r"
                . " WHERE cp.`camp_id` = '". $campId . "' "
                . "AND cp.`camp_price_type` != 0"
                . " AND cp.`price` > 0 "
                . "GROUP BY week";
        if($this->db->query($sql)->num_rows() == 0){
            return false;
        }
        $res = $this->db->query($sql)->result_array();
        $output = array();
        foreach($res as $item){
            $output[$item['week_number']] = $item['nb_results'];
        }
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
    
    function getExtendedPrice($camp_id = 1){
        $sql = "SELECT `extra_days_fee` FROM `camps` WHERE `id` = '". $camp_id ."' LIMIT 1";
        $result = $this->db->query($sql)->result_array();
        return $result[0]['extra_days_fee'];
    }
}
