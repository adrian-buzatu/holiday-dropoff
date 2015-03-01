<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
    }

    public function index() {
        $this->form_validation->set_error_delimiters('<div id="login_error">', '</div>');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_contact_data');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false){
            $this->layout->view('login', $this->data);
            
        }
        else{
            redirect('');
            
        }
    }

    function check_contact_data() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->Users->checkLoginDetails($username, $password) == false) {
            $this->form_validation->set_message("check_contact_data", "The login details are incorrect");
            return false;
        } else
            return true;
    }

}
