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
class Settings_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getItem($item){
        $sql = "SELECT * FROM `settings` LIMIT 1";
        $query = $this->db->query($sql);
        if($query->num_rows == 0){
            return false;
        }
        $res = $query->result_array();
        return isset($res[0][$item]) ? $res[0][$item] : false;
    }
    
    public function updateAddress($address){
        $up = array(
            'address' => $address,
            'address_url' => $this->makeGMapsUrl($address)
        );
        
        $this->db->update('settings', $up, array('id' => 1));
    }
    
    public function makeGMapsUrl($address){
        return $address;
    }
    
    public function updateItem($item){
        if (!$this->db->field_exists(key($item), 'settings')){
            $this->load->dbforge();
            $fields = array(
                key($item) => array('type' => 'TEXT')
            );
            $this->dbforge->add_column('settings', $fields);
        }
        $this->db->update('settings', $item, array('id' => 1));
    }
}
