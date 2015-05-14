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
class Newsletter_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function get($per_page = 25, $page = 1){
        $sql = "SELECT * FROM `newsletter` "
                . "LIMIT ". (($page - 1) * $per_page). ", " .$per_page ;
        $query = $this->db->query($sql);
        if($query->num_rows == 0){
            return false;
        }
        return $query->result_array();
    }
    
    
    public function count(){
        $sql = "SELECT * FROM `newsletter`";
        $query = $this->db->query($sql);
        return $query->num_rows;
    }
    
    public function csv(){
        query_to_csv($this->__allQuery());
    }
    
    private function __allQuery(){
        return $this->db->query("SELECT `email` FROM `newsletter`");
        
    }
    
    
}
