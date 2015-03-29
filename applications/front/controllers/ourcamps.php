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
        $this->load->model('Pages_Model', 'Pages');
        
    }
    
    public function index(){
        $this->data['testimonials'] = $this->Testimonials->get(); 
        $this->data['whatHappens'] = $this->Pages->getBySlug('what-happens');
        $this->data['sportsAtHDO'] = $this->Pages->getBySlug('sports-at-hdo');
        $this->data['facilities'] = $this->Pages->getBySlug('facilities');
        $this->data['campDates'] = $this->Pages->getBySlug('camp-dates');
        $this->data['staffAtHDO'] = $this->Pages->getBySlug('staff-at-hdo');
        $this->layout->view('ourcamps/index.php', $this->data);
    }
    
}