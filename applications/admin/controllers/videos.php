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
class Videos extends CI_Controller {
    
     public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Gallery_Model', 'Gallery');
    }
    public function index()
    {        
        $configTable = $this->data['configTable'];
        $configTableCustom = array(
            'title' => 'Video Gallery',
            'headers' => array('Title', 'Category', 'Url', ),
            'displayedFields' => array('title', 'category', 'src'),
            
            'data' => $this->Gallery->get('Video'),
            'links' => array(
                'title' => $configTable['editBaseUrl']. ',id'
            )
        );
        $configTable = array_merge($configTableCustom, $configTable);
        $this->data['list'] = $this->layout->table($configTable);
        $this->layout->view('videos/index.php', $this->data);
    }
    
    public function create(){
        $this->data['success'] = false;
        $this->data['galleryCategories'] = $this->Gallery->getGalleryCategoriesForForm();
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('src', 'Video Url', 'required');        
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            
            $galleryVideo = array(
                'title' => $this->input->post('title', true),
                'gallery_category_id' => (int)$this->input->post('gallery_category_id', true),
                'src' => $this->input->post('src', true),
                'type' => 'Video'
            );
            $this->data['success'] = true;
            $this->Gallery->add($galleryVideo);
            
        }
        $this->layout->view('videos/create.php', $this->data);
    }
    
    public function edit($id){
        $this->data['success'] = false;
        $this->data['galleryCategories'] = $this->Gallery->getGalleryCategoriesForForm();
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('src', 'Video Url', 'required'); 
        $this->data['banner'] = $this->Gallery->one($id);
        $this->form_validation->set_message("required", "%s required");
        $this->data['id'] = $id;
        if ($this->form_validation->run() == false) {
            
        } else {
            $this->data['success'] = true;
            $galleryVideo = array(
                'title' => $this->input->post('title', true),
                'gallery_category_id' => (int)$this->input->post('gallery_category_id', true),
                'src' => $this->input->post('src', true),
                'type' => 'Video'
            );
            $this->Gallery->update($galleryVideo, $id);
        }
        $this->layout->view('videos/edit.php', $this->data);
    }
    
    function delete($id){
        $this->Gallery->delete($id);
        redirect('videos');
    }
}
