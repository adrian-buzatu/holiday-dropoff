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
class Notificationemail extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Settings_Model', 'Settings');
        $this->data = $this->main->data;
        
    }
    
    public function index(){
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->data['email'] = $this->Settings->getItem('notification_email');
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            
            $this->data['success'] = true;
            
            if($this->data['success'] == true){
                $this->Settings->updateItem(array('notification_email' => $this->input->post('email', true)));
            } 
        }
        $this->layout->view('notificationemail/index.php', $this->data);
    }
}
