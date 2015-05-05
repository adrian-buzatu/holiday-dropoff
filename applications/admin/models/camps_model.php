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
    
    function get($perPage = 25, $page = 1){
        $result = $this->db->get('camps');
        if($result->num_rows() == 0){
            return false;
        }
        return $result->result_array();
    }
    
    function add($camp){
        $this->db->insert('camps', $camp);
        return $this->db->insert_id();
    }
    
    function addCampPrices($pricesArray, $campId){
        $this->db->delete('camp_prices', array('camp_id' => $campId));
        foreach($pricesArray as $weekDay => $price){
            $this->db->insert('camp_prices', 
                array(
                    'camp_id' => $campId, 
                    'camp_price_type' => $weekDay,
                    'price' => $price
                )
            );
        }
        return true;
    }
    
    function getOne($id){
        $result = $this->db->get_where('camps', array('id' => $id), 1);
        if($result->num_rows() == 0){
            return false;
        }
        $rows = $result->result_array();
        $row = $rows[0];
        $row['prices'] = $this->getCampaignPrices($id);
        return $row;
    }
    
    function update($campGroup, $where){
        $this->db->update('camps', $campGroup, $where);
        return true;
    }
    
    function delete($id){
        $this->db->delete('camps', array('id' => $id));
        return true;
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
        foreach($rows as $row){
            $output[$row['camp_price_type']] = $row['price'];
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
    
    function getCampsForForm(){        
        $camps = $this->get();
        if(!is_array($camps)){
            return false;
        }
        $output = array();
        foreach ($camps as $item){
            $output[$item['id']] = $item['name'];
        }
        return $output;
    }
}
