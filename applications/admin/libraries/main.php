<?php

class Main {

    public function __construct() {
        session_start();
        $CI = &get_instance();
        
        $CI->load->model('Users_Model', 'Users');
        
        $data = array();
        $this->data['user'] = array();
        
        if (!(isset($_SESSION['username'])) && controller() != "login") {
            redirect('login');
        } elseif (isset($_SESSION['username'])) {
            $this->data['user_id'] = $_SESSION['username']['user_id'];
            $this->data['user'] = $_SESSION['username'];
            $this->data['user']['role'] = $_SESSION['username']['role'];
        }
    }

}