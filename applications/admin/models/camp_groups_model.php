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
class Camp_Groups_Model  extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    function get($perPage = 25, $page = 1){
        $result = $this->db->get('camp_groups');
        if($result->num_rows() == 0){
            return false;
        }
        return $result->result_array();
    }
    
    function add($campGroup){
        $this->db->insert('camp_groups', $campGroup);
        return $this->db->insert_id();
    }
    
    function getOne($id){
        $result = $this->db->get_where('camp_groups', array('id' => $id), 1);
        if($result->num_rows() == 0){
            return false;
        }
        $rows = $result->result_array();
        return $rows[0];
    }
    
    function update($campGroup, $where){
        $this->db->update('camp_groups', $campGroup, $where);
        return true;
    }
    
    function delete($id){
        $this->db->delete('camp_groups', array('id' => $id));
        return true;
    }
}
