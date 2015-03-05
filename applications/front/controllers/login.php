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
    
    function forgot() {
       
        $this->form_validation->set_rules('email', '"Mail"', 'valid_email|required|callback_mail_exists');
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() == false) {
            $this->data['success'] = false;
        } else {
            $this->data['success'] = true;
            $user = $this->Users->oneFromMail(addslashes($this->input->post('email', true)));
            $id = $user['id'];
            $newPass = $this->Users->generatePass(7, true);
            $this->db->update('users', array('password' => sha1($newPass)), array('id' => $id));
            $message = "<p>Dear ". $user['username']. "</p>".
                    "<p>Here is a newly generated password: ". $newPass.".<br /> It is recommended that you change it after login</p>".
                    "<p><br /><br />With respect,<br /> The Holiday Drop-off team</p>";
            //echo $id;die;
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From:info@holidaydropoff.com";
            mail($this->input->post('email', true), "Password change request", $message, $headers);
        }
        $this->layout->view('forgot', $this->data);
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
