<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Companyaddress
 *
 * @author shade
 */
class Companyaddress extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Settings_Model', 'Settings');
        $this->data = $this->main->data;
        
    }
    
    public function index(){
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->data['address'] = $this->Settings->getAddress();
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            
            $this->data['success'] = true;
            
            if($this->data['success'] == true){
                $this->Settings->updateAddress($this->input->post('address'));
            } 
        }
        $this->layout->view('companyaddress/index.php', $this->data);
    }
}
