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
    
    public function index()
    {        
        $this->layout->view('pages/index.php', $this->data);
    }
    
    public function edit($slug = ''){
        $page = $this->data['page'] = $this->Pages->getBySlug($slug);
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            $content = $this->input->post('content', true);
            $content_raw = strip_tags($content);
            $up = array(
                'title' => $page['title'],
                'date_updated' => time(),
                'status' => 1,                
                'content' => $content,
                'content_raw' => $content_raw
            );
            $this->data['success'] = true;
            $this->Pages->updatePage($up, array('slug' => $slug));
        }
        $this->layout->view('pages/edit.php', $this->data);
    }
    
    public function add(){
        
    }
    
    public function delete(){
        
    }
}