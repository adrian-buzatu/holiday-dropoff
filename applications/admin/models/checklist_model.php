<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of checklist_items_model
 *
 * @author shade
 */
class Checklist_Model  extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    function get($perPage = 25, $page = 1){
        $result = $this->db->get('checklist_items');
        if($result->num_rows() == 0){
            return false;
        }
        return $result->result_array();
    }
    
    function add($checklistItem){
        $this->db->insert('checklist_items', $checklistItem);
        return $this->db->insert_id();
    }
    
    function getOne($id){
        $result = $this->db->get_where('checklist_items', array('id' => $id), 1);
        if($result->num_rows() == 0){
            return false;
        }
        $rows = $result->result_array();
        return $rows[0];
    }
    
    function update($checklistItem, $where){
        $this->db->update('checklist_items', $checklistItem, $where);
        return true;
    }
    
    function delete($id){
        $this->db->delete('checklist_items', array('id' => $id));
        return true;
    }
}
