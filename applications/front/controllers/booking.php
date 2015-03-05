<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of banners
 *
 * @author shade
 */
class Booking extends CI_Controller {
    
     public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('News_Model', 'News');
    }
    public function index()
    {        
        
        $this->layout->view('booking/index.php', $this->data);
    }
    
    
}
