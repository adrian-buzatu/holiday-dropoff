<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gallery
 *
 * @author shade
 */
class Gallery  extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Gallery_Model', 'Gallery');
        $this->load->model('Gallery_Categories_Model', 'Gallery_Categories');
    }
    
    public function index($category = 0, $tab = 'images'){
        $categories = $this->data['categories'] = $this->Gallery_Categories->get();
        if($category == 0){
            $category = $categories[0]['id'];
        }
        $this->data['tab'] = $tab;
        $this->data['images'] = $this->Gallery->get('Image', $category);
        $this->data['videos'] = $this->Gallery->get('Video', $category);
        $this->layout->view('gallery/index', $this->data);
    }
}
