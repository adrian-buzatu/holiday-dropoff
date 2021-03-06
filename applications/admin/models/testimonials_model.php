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
class Testimonials_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    function get(){
        $sql = "SELECT `id`, SUBSTR(`content_raw`, 1, 50) as `content_raw` FROM `testimonials`";
        $query = $this->db->query($sql);
        if($query->num_rows == 0){
            return false;
        }
        return $query->result_array();
    }
    
    public function one($id){
        $query = $this->db->get_where('testimonials', array('id' => $id), 1);
        if($query->num_rows == 0){
            return false;
        }
        $page_raw = $query->result_array();
        return $page_raw[0];
    }
    
    public function update($updateData, $id){
        
        $this->db->update('testimonials', $updateData, array('id' => $id));
        return true;
    }
    
    public function delete($id){
        
        $this->db->update('delete', array('id' => $id));
        return true;
    }
    
    public function insert($insertData){
        
        $this->db->insert('testimonials', $insertData);
        return $this->db->insert_id();
    }
}
