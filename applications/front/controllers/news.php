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
class News extends CI_Controller {
    
     public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('News_Model', 'News');
    }
    public function view($slug = ''){
        $page = $this->data['page'] = $this->News->one($slug);
        $this->data['slug'] = $slug;
        $this->layout->view('news/view.php', $this->data);
    }
}
