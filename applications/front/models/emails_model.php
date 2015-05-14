<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of email_templates_model
 *
 * @author shade
 */
class Emails_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function get($slug = ""){
        $query = $this->db->get_where('email_templates', array('slug' => $slug), 1);
        if($query->num_rows == 0){
            return false;
        }
        $page_raw = $query->result_array();
        return $page_raw[0];
    }
    
    public function updateTemplate($updateData, $whereCondition){
        if($this->getBySlug($whereCondition['slug']) === false){
            $updateData['slug'] = $whereCondition['slug'];
            $this->db->insert('email_templates', $updateData);
        } else {
            $this->db->where($whereCondition);
            $this->db->update('email_templates', $updateData);
        }
        
        return true;
    }
    //put your code here
}
