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
class Pages_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getBySlug($slug = ""){
        $query = $this->db->get_where('pages', array('slug' => $slug), 1);
        if($query->num_rows == 0){
            return false;
        }
        $page_raw = $query->result_array();
        return $page_raw[0];
    }
    
    public function updatePage($updateData, $whereCondition){
        $this->db->where($whereCondition);
        $this->db->update('pages', $updateData);
        return true;
    }
    //put your code here
}
