<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pages
 *
 * @author shade
 */
class Ourcamps extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Testimonials_Model', 'Testimonials');
    }
    
    public function index(){
        $this->data['testimonials'] = $this->Testimonials->get();        
        $this->layout->view('ourcamps/index.php', $this->data);
    }
    
}