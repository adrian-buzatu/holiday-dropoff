<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account
 *
 * @author shade
 */
class Account extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        
    }
    
    public function change_password(){
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('old_pass', 'Old Password', 'required|callback_check_old_pass');
        $this->form_validation->set_rules('new_pass', 'New Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            $this->data['success'] = true;
            $userId = $this->data['user_id'];
            $password = sha1($this->input->post('new_pass'));
            $this->Users->update(array('password' => $password), array('id' => $userId));
        }
        $this->layout->view('account/change_password', $this->data);
    }
    
    public function check_old_pass(){
        $oldPass = sha1($this->input->post('old_pass', true));
        $userId = $this->data['user_id'];
        if($this->Users->checkOldPass($oldPass, $userId) == false){
            $this->form_validation->set_message('check_old_pass', 'You typed the current password wrong');
            return false;
        } else {
            return true;
        }
    }
}
