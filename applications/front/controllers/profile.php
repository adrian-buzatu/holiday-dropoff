<?php

class Profile extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Booking_Model', 'Booking');
    }

    function index() {   
        
        if (!isset($this->data['user_id']) || (int)$this->data['user_id'] < 1) {
            redirect('login');
        }
        $this->load->library('session');
        $this->data['countries'] = $this->Users->getCountriesForForm();
        $this->data['me'] = $this->Users->one((int)$this->data['user_id']);
        $this->data['children'] = $this->Users->getUserChildren($this->data['user_id']);
        $this->data['bookings'] = $this->Booking->getUserFinalizedBookings((int)$this->data['user_id']);
        $this->form_validation->set_rules('first_name', '"First Name"', 'required');
        $this->form_validation->set_rules('last_name', '"Last Name"', 'required');
        $this->form_validation->set_rules('username', '"Username"', 'required|callback_username_unique');
        $this->form_validation->set_rules('zip', '"Zip"', 'required');
        $this->form_validation->set_rules('country_id', '"Country"', 'required');
        $this->form_validation->set_rules('landline', '"Landline"', 'required');
        $this->form_validation->set_rules('reference', '"Reference"', 'required');
        $this->form_validation->set_rules('address1', '"Address 1"', 'required');
        if($this->input->post('password') != ""){
            $this->form_validation->set_rules('old_password', '"Old Password"', 'min_length[4]|callback_valid_password');
            $this->form_validation->set_rules('password', '"Password"', 'min_length[4]');
            $this->form_validation->set_rules('passconf', '"Password Conf"', 'matches[password]');
        }
        $this->form_validation->set_rules('phone_number', '"Phone Number"', 'required');
        $this->form_validation->set_rules('email', '"Mail"', 'valid_email|required|callback_mail_unique');
        $this->form_validation->set_error_delimiters('<div class="errorFrm">', '</div>');
        if ($this->form_validation->run() == false) {
            $this->data['success'] = false;
            $this->layout->view('profile', $this->data);
        } else {
            $this->data['success'] = true;
            $this->session->set_flashdata('profile_up_success', 'The Profile Was Updated Successfully');
            $user = array(
                'email' => $this->input->post('email', true),
                'title' => $this->input->post('title', true),
                'first_name' => $this->input->post('first_name', true),
                'last_name' => $this->input->post('last_name', true),
                'username' => $this->input->post('username', true),
                'landline' => $this->input->post('landline', true),
                'phone_number' => $this->input->post('phone_number', true),
                'address1' => $this->input->post('address1', true),
                'address2' => $this->input->post('address2', true),
                'address3' => $this->input->post('address3', true),
                'country_id' => $this->input->post('country_id', true),
                'zip' => $this->input->post('zip', true),
                'reference' => $this->input->post('reference', true),
            );
            if($this->input->post('password') != ""){
                $user['password'] = sha1($this->input->post('password'));
            }
            $this->Users->update($user, (int)$this->data['user_id']);
            
            $this->data['user'] = $_SESSION['username'];
            redirect('profile');
        }
        
    }
    
    function success(){
        
    }
    
    function username_unique() {
        $username = $this->input->post('username');
        if ($_SESSION['username']['user'] != $username && $this->Users->checkUser($username) == false) {
            $this->form_validation->set_message('username_unique', 'Username must be unique');
            return false;
        } else {
            return true;
        }
    }

    function mail_unique() {
        $email = $this->input->post('email');
        if ($email != "" && $email != $_SESSION['username']['email'] && $this->Users->checkMail($email) == false) {
            $this->form_validation->set_message('mail_unique', 'Adresa de mail trebuie sa fie unica');
            return false;
        } else {
            return true;
        }
    }
    
    function add_child(){
        $post = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'birthdate' => strtotime($this->input->post('birthdate')),
            'notes' => $this->input->post('notes'),
        );
        $childId = $this->Users->addChild($post, $this->data['user_id']);
        $post['id'] = $childId;
        echo json_encode(array('success' => true, 'data' => $post));
    }
    
    function update_child(){
        $post = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'birthdate' => strtotime($this->input->post('birthdate')),
            'notes' => $this->input->post('notes'),
            'id' => $this->input->post('child_id')
        );
        $this->Users->updateChild($post, $this->input->post('child_id'));
        echo json_encode(array('success' => true, 'data' => $post));
    }
    
    function delete_child(){
        
        $this->Users->removeChild($this->data['user_id'], $this->input->post('child_id'));
        echo json_encode(array('success' => true));
    }
    
    function get_child(){
        $id = $this->input->post('child_id');
        $child = $this->Users->getOneChild($id);
        $child['birthdate'] = date('m/d/Y', $child['birthdate']);
        if($child['notes'] === 0){
            $child['notes'] = '';
        }
        echo json_encode(array('success' => true, 'data' => $child));
    }
    
    function valid_password(){
        $pass = sha1($this->input->post('old_password'));
        $me = $this->Users->one((int)$this->data['user_id']);
        if($me['password'] !== $pass){
            $this->form_validation->set_message('valid_password', 'The current password is wrong');
            return false;
        } 
        return true;
    }

}
