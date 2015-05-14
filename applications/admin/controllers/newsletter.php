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
class Newsletter extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Newsletter_Model', 'Newsletter');
    }
    
    public function index($page = 1)
    {        
        $configTable = $this->data['configTable'];
        $configTableCustom = array(
            'title' => 'Newsletter',
            'headers' => array('Email'),
            'displayedFields' => array('email'),
            'customHeader' => array('title' => 'Export CSV', 'url' => base_url(). "newsletter/csv"),
            'data' => $this->Newsletter->get()
        );
        $configTable = array_merge($configTableCustom, $configTable);
        $this->data['list'] = $this->layout->table($configTable);
        $this->layout->view('newsletter/index.php', $this->data);
    }
    
    
    public function csv(){
        $this->Newsletter->csv();
    }
    
}