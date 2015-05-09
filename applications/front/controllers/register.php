<?php

class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        
    }

    function index() {
        $this->form_validation->set_rules('first_name', '"First Name"', 'required');
        $this->form_validation->set_rules('last_name', '"Last Name"', 'required');
        $this->form_validation->set_rules('username', '"Username"', 'required|callback_username_unique');
        $this->form_validation->set_rules('zip', '"Zip"', 'required');
        $this->form_validation->set_rules('country_id', '"Country"', 'required');
        $this->form_validation->set_rules('landline', '"Landline"', 'required');
        $this->form_validation->set_rules('reference', '"Reference"', 'required');
        $this->form_validation->set_rules('address1', '"Address 1"', 'required');
        $this->form_validation->set_rules('password', '"Password"', 'required|min_length[4]');
        $this->form_validation->set_rules('passconf', '"Password Conf"', 'matches[password]');
        $this->form_validation->set_rules('phone_number', '"Phone Number"', 'required');
        $this->form_validation->set_rules('email', '"Mail"', 'valid_email|required|callback_mail_unique');
        $this->data['countries'] = $this->Users->getCountriesForForm();
        $this->form_validation->set_error_delimiters('<div class="errorFrm">', '</div>');
        if ($this->form_validation->run() == false) {
            $this->data['showForm'] = true;
            
        } else {
            $this->data['showForm'] = false;
            $user = array(
                'email' => $this->input->post('email', true),
                'first_name' => $this->input->post('first_name', true),
                'last_name' => $this->input->post('last_name', true),
                'username' => $this->input->post('username', true),
                'password' => sha1($this->input->post('password')),
                'landline' => $this->input->post('landline', true),
                'phone_number' => $this->input->post('phone_number', true),
                'address1' => $this->input->post('address1', true),
                'address2' => $this->input->post('address2', true),
                'address3' => $this->input->post('address3', true),
                'zip' => $this->input->post('zip', true),
                'reference' => $this->input->post('reference', true),
            );


            $user_id = $this->Users->add($user);
            $user['id'] = $user_id;
            unset($user['password']);
            $headers = "From:info@holidaydropoff.com\r\n"; 
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $to = $this->input->post('email');
            $subject = "Holiday Drop Off - New Account Confirmation";
            $message = "<p>Dear ". $user['first_name']. " " .$user['last_name']. "</p>".
                    "<p>You account has been succesfully created.<br /> "
                    . "You can now log in using the chosen credentials</p>".
                    "<p><br /><br />Kind regards, <br /> The Holiday Drop Off team</p>";
            mail($to, $subject, $message, $headers);
            
            //redirect('login');
        }
        $this->layout->view('register', $this->data);
    }

    
    

    function password_recovery($code) {
        $res = $this->Users->recovery_code($code);
        $this->data['code'] = $code;
        if ($res == false) {
            $this->data['title'] = "Cod eronat";
            $this->layout->view('forbidden', $this->data);
        } else {
            $this->data['title'] = "Recuperare PIN - Pas 2";
            $this->form_validation->set_rules('password', '"Parola"', 'required|matches[passconf]');
            /* if ($this->form_validation->run() == false) {
              $this->data[controller() . '_frmLoad'] = false;
              } else {
              $this->data[controller() . '_frmLoad'] = false;
              $pass = sha1($this->input->post('password'));
              $email = $res['email'];
              pr($res);die();
              $this->Users->generateUserPin($email, 1);
              } */
            $this->data[controller() . '_frmLoad'] = false;
            $pass = sha1($this->input->post('password'));
            $email = $res['email'];

            $this->Users->generateUserPin($email, 1);
            $this->layout->view('recover_password', $this->data);
        }
    }

    
    function mail_unique() {
        $email = $this->input->post('email');
        if ($this->Users->checkMail($email) == false) {
            $this->form_validation->set_message('mail_unique', 'Mail must be unique');
            return false;
        } else {
            return true;
        }
    }
    
    function username_unique() {
        $username = $this->input->post('username');
        if ($this->Users->checkUser($username) == false) {
            $this->form_validation->set_message('username_unique', 'Username must be unique');
            return false;
        } else {
            return true;
        }
    }

    function mail_exists() {
        $email = $this->input->post('email');
        if ($this->Users->checkMail($email) == true) {
            $this->form_validation->set_message('mail_exists', 'The e-mail address doesn\'t exist in our database');
            return false;
        } else {
            return true;
        }
    }

}
