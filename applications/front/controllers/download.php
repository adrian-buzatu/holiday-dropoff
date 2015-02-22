<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of download
 *
 * @author shade
 */
class Download extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        
    }
    
    public function get($filename = ''){
        $this->load->helper('download');
        $downloadPath = base_path(). "assets/front/images/uploads/". $filename;
        $data = file_get_contents($downloadPath); // Read the file's contents
        force_download($filename, $data);
        
    }
}
