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
class Pages extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Pages_Model', 'Pages');
    }
    
    public function view($slug = ''){
        $page = $this->data['page'] = $this->Pages->getBySlug($slug);
        
        $this->layout->view('pages/view.php', $this->data);
    }
    
}