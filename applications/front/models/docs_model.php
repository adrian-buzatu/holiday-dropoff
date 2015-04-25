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
class Docs_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getFlyer(){
        $query = $this->db->get_where('docs', array('type' => 'FLYER'));
        if($query->num_rows == 0){
            return false;
        }
        $flyer = $query->result_array();
        return $flyer[0];
    }
    
    public function setFlyer($flyer){
        if($this->getFlyer() == false){
            $insert = array(
                'file' => $flyer,
                'type' => 'FLYER'
            );
            $this->db->insert('docs', $insert);
        } else {
            $flyerDB = $this->getFlyer();
            $up = array(
                'file' => $flyer
            );
            $where = array(
                'id' => $flyerDB['id']
            );
            $this->db->update('docs', $up, $where);
        }
        return true;
    }
   
    public function getCsv(){
        $query = $this->db->get_where('docs', array('type' => 'CSV'));
        if($query->num_rows == 0){
            return false;
        }
        $flyer = $query->result_array();
        return $flyer[0];
    }
    
    public function setCsv($csv){
        if($this->getCsv() == false){
            $insert = array(
                'file' => $csv,
                'type' => 'CSV'
            );
            $this->db->insert('docs', $insert);
        } else {
            $csvDB = $this->getCsv();
            $up = array(
                'file' => $csv
            );
            $where = array(
                'id' => $csvDB['id']
            );
            $this->db->update('docs', $up, $where);
        }
        return true;
    }
}
