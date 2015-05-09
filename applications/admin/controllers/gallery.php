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
class Gallery extends CI_Controller {
    
     public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Gallery_Model', 'Gallery');
    }
    public function index()
    {        
        $configTable = $this->data['configTable'];
        $configTableCustom = array(
            'title' => 'Gallery',
            'headers' => array('Image', 'Category', 'Title'),
            'displayedFields' => array('src', 'category', 'title'),
            'fieldTemplate' => array(
                'src' => "<img class='banner_image_admin' src='". front_url(). "timthumb.php?src=" .  front_url(). "assets/front/images/banners/{src}&w=62'>"
            ),
            'data' => $this->Gallery->get(),
            'links' => array(
                'title' => $configTable['editBaseUrl']. ',id'
            )
        );
        $configTable = array_merge($configTableCustom, $configTable);
        $this->data['list'] = $this->layout->table($configTable);
        $this->layout->view('gallery/index.php', $this->data);
    }
    
    public function create(){
        $this->data['success'] = false;
        $this->data['galleryCategories'] = $this->Gallery->getGalleryCategoriesForForm();
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('title', 'Title', 'required');
        if (empty($_FILES['image']['name']))
        {
            $this->form_validation->set_rules('image', 'Image', 'required');
        }
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            $file = $_FILES['image'];
            
            $name = time() . "_" . $this->__slugify_filename($file['name']);
            $config['upload_path'] = base_path(). "assets/front/images/banners/";
            $config['allowed_types'] = 'jpg|png|gif|bmp';
            $config['max_size']	= '20480';
            $config['file_name'] = $name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->data['success'] = false;
                $this->data['error'] = $error['error'];

            } else {
                $fileData = $this->upload->data();
                chmod($fileData['full_path'],0777);
                $config['image_library'] = 'gd2';
                $config['source_image']	= $fileData['full_path'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']	= 600;
                $config['height']	= 150;

                $this->load->library('image_lib', $config); 

                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors(); exit;
                }
                
                $galleryPhoto = array(
                    'title' => $this->input->post('title', true),
                    'gallery_category_id' => (int)$this->input->post('gallery_category_id', true),
                    'src' => $name
                );
                $this->data['success'] = true;
                $this->Gallery->add($galleryPhoto);
            }
            
        }
        $this->layout->view('gallery/create.php', $this->data);
    }
    
    public function edit($id){
        $this->data['success'] = false;
        $this->data['galleryCategories'] = $this->Gallery->getGalleryCategoriesForForm();
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->data['banner'] = $this->Gallery->one($id);
        $this->form_validation->set_message("required", "%s required");
        $this->data['id'] = $id;
        if ($this->form_validation->run() == false) {
            
        } else {
            $galleryPhoto = array();
            $this->data['success'] = true;
            if (!empty($_FILES['image']['name'])){
                $file = $_FILES['image'];
                $name = time() . "_" . $this->__slugify_filename($file['name']);
                $config['upload_path'] = base_path() . "assets/front/images/banners/";
                $config['allowed_types'] = 'jpg|png|gif|bmp';
                $config['max_size'] = '20480';
                $config['file_name'] = $name;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->data['success'] = false;
                    $this->data['error'] = $error['error'];
                } else {
                    $fileData = $this->upload->data();
                    chmod($fileData['full_path'], 0777);
                    $galleryPhoto['src'] = $name;                   
                    
                    
                }
            }
            if($this->data['success'] == true){
                $galleryPhoto['title'] = $this->input->post('title', true);
                $galleryPhoto['gallery_category_id'] = (int)$this->input->post('gallery_category_id', true);
                $this->Gallery->update($galleryPhoto, $id);
            }
            
            
            
        }
        $this->layout->view('gallery/edit.php', $this->data);
    }
    
    function delete($id){
        $this->Gallery->delete($id);
        redirect('gallery');
    }
    
    private function __slugify_filename($fname){
        return url_title( str_replace( pathinfo( $fname, PATHINFO_EXTENSION ), '', $fname ) ) . "." . pathinfo( $fname, PATHINFO_EXTENSION );
    }
}
