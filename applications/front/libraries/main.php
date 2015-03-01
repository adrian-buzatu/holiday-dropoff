<?php

class Main {

    public function __construct() {
        session_start();
        $CI = &get_instance();
        $CI->load->model('Users_Model', 'Users');
        $CI->load->model('Camp_Groups_Model', 'Camp_Groups');
        $CI->load->model('Gallery_Model', 'Gallery');
        $this->data = array();
        if (isset($_SESSION['username'])) {
            $this->data['user_id'] = $_SESSION['username']['user_id'];
            $this->data['user'] = $_SESSION['username'];
            $this->data['user']['role'] = $_SESSION['username']['role'];            
        }
        $this->data['campGroups'] = $CI->Camp_Groups->get();
        $this->data['galleryPics'] = $CI->Gallery->setLimit(6)->get();
        
    }

}
