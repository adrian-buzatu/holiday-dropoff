<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users
 *
 * @author shade
 */
class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
    }
    public function index()
    {        
        $configTable = $this->data['configTable'];
        $configTableCustom = array(
            'title' => 'Users',
            'headers' => array('Title', 'Surname', 'Forname', 'Username'),
            'displayedFields' => array('title', 'first_name', 'last_name', 'username'),
            
            'data' => $this->Users->getFrontUsers(2),
            'links' => array(
                'username' => $configTable['editBaseUrl']. ',id'
            )
        );
        $configTable = array_merge($configTableCustom, $configTable);
        $this->data['list'] = $this->layout->table($configTable);
        $this->layout->view('users/index.php', $this->data);
    }
    
    public function edit($id){
        $this->data['user'] = $this->Users->one($id);
        $this->data['countries'] = $this->Users->getCountriesForForm();
        $this->data['success'] = false;
        $this->data['id'] = $id;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('first_name', 'Forename', 'required');
        $this->form_validation->set_rules('last_name', 'Surname', 'required');
        if($this->input->post('username') != $this->data['user']['username']){
            $this->form_validation->set_rules('username', 'User', 'required|is_unique[users.username]');
        }
        if($this->input->post('email') != $this->data['user']['email']){
            $this->form_validation->set_rules('email', 'E-mail', 'required|is_required[users.email]');
        }
        $this->form_validation->set_rules('phone_number', 'Mobile Number', 'required');
        $this->form_validation->set_rules('address1', 'Address1', 'required');
        $this->form_validation->set_rules('zip', 'Postal Code', 'required');
        $this->form_validation->set_message("is_unique", "%s is already Taken");
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            $this->data['success'] = true;
            $up = array(
                'title' => $this->input->post('title', true),
                'first_name' => $this->input->post('first_name', true),
                'last_name' => $this->input->post('last_name', true),
                'username' => $this->input->post('username', true),
                'email' => $this->input->post('email', true),
                'phone_number' => $this->input->post('phone_number', true),
                'landline' => $this->input->post('landline', true),
                'zip' => $this->input->post('zip', true),
                'country_id' => (int)$this->input->post('country_id', true),
                'reference' => $this->input->post('reference', true),
                'zip' => $this->input->post('zip', true),
                'date_updated' => time(),
                'address1' => $this->input->post('address1', true),
                'address2' => $this->input->post('address2', true),
                'address3' => $this->input->post('address3', true),
                
            );
            $this->Users->update($up, $id);
        }
        $this->layout->view('users/edit.php', $this->data);
    }
    
    function delete($user_id){
        $this->Users->update(array('status' => 0), $user_id);
        redirect('users');
    }
}
