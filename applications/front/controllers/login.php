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
            $redirect ='';
            if($_SESSION['username']['first_login'] == 1){
                $redirect = 'profile';
                $this->Users->update(array('first_login' => 0), $_SESSION['username']['user_id']);
                $_SESSION['username']['first_login'] = 0;
            }
            
            redirect($redirect);
            
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
            $recovery_code = sha1(time());
            $this->db->update('users', 
                    array(
                        'password' => sha1($newPass),
                        'recovery_code' => $recovery_code
                    ), array('id' => $id));
            $message = "<p>Dear ". $user['username']. "</p>".
                    "<p>Here is a newly generated password: ". $newPass."<br /> It is recommended that you change it after login</p>".
                    "<p>If you prefer to change it right away you can click <a href='". base_url() ."login/change_pass/". $recovery_code ."'>here</a> </p>".
                    "<p><br /><br />Kind regards, <br /> The Holiday Drop Off team</p>";
            //echo $id;die;
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From:info@holidaydropoff.com";
            mail($this->input->post('email', true), "Password change request", $message, $headers);
        }
        $this->layout->view('forgot', $this->data);
    }
    
    function change_pass($recovery_code){
        $this->form_validation->set_rules('password', '"Password"', 'required|min_length[4]');
        $this->form_validation->set_rules('passconf', '"Password Conf"', 'matches[password]');
        $this->data['recovery_code'] = $recovery_code;
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() == false) {
            $this->data['success'] = false;
            $this->layout->view('change_pass', $this->data);
        } else {
            $this->data['success'] = true;
            $user = $this->Users->oneFromRecoveryCode($recovery_code);
            $id = $user['id'];
            $newPass = $this->input->post('password');
            $this->db->update('users', 
                    array(
                        'password' => sha1($newPass),
                        'recovery_code' => 0
                    ), array('id' => $id));
            $this->session->set_flashdata('change_pass_success', 'You can now login with the new pass');
            redirect('login');
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
