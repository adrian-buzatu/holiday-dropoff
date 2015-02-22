<?php

class Banners_Model extends CI_Model {

    
    public function __construct() {
        parent::__construct();
    }

    public function get(){
        $result = $this->db->get('banners');
        if($result->num_rows() == 0){
            return false;
        }
        return $result->result_array();
    }
    
    function add($banner){
        $this->db->insert('banners', $banner);
        return $this->db->insert_id();
    }
    
    function update($banner, $id){
        $this->db->update('banners', $banner, array('id' => $id));
        return true;
    }
    
    function delete($id){
        $this->db->delete('banners', array('id' => $id));
        return true;
    }
    
    function one($id){
        $result = $this->db->get_where('banners', array('id' => $id), 1);
        if($result->num_rows() == 0){
            return false;
        } else {
            $row = $result->result_array();
            return $row[0];
        } 
    }
    
}
