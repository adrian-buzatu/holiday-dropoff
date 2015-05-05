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
class Newsletter_Model extends CI_Model {
    
    private $__email = '';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function setEmail($email){
        $this->__email = $email;
        return $this;
    }   
    
    public function insert(){
        if($this->__checkEmail()){
            $this->db->insert('newsletter', array('email' => $this->__email));
            return true;
        }
        return false;
    }
    
    private function __checkEmail(){
        if(!filter_var($this->__email, FILTER_VALIDATE_EMAIL)){            
            return false;
        }
        $sql = "SELECT `id` FROM `newsletter` WHERE `email` = '". $this->__email . "'";
        $res = $this->db->query($sql);
        if($res->num_rows() == 0){
            return true;
        }
        return false;
    }
    
}
