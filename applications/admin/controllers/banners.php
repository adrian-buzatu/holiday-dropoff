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
class Banners extends CI_Controller {
    
     public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Banners_Model', 'Banners');
    }
    public function index()
    {        
        $configTable = $this->data['configTable'];
        $configTableCustom = array(
            'title' => 'Banners',
            'headers' => array('Image', 'Title'),
            'displayedFields' => array('image', 'title'),
            'fieldTemplate' => array(
                'image' => "<img class='banner_image_admin' src='" .  front_url(). "assets/front/images/banners/{image}'>"
            ),
            'data' => $this->Banners->get(),
            'links' => array(
                'title' => $configTable['editBaseUrl']. ',id'
            )
        );
        $configTable = array_merge($configTableCustom, $configTable);
        $this->data['list'] = $this->layout->table($configTable);
        $this->layout->view('banners/index.php', $this->data);
    }
    
    public function create(){
        $this->data['success'] = false;
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
            $name = time() . "_" . $file['name'];
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
                $banner = array(
                    'title' => $this->input->post('title', true),
                    'image' => $name
                );
                $this->data['success'] = true;
                $this->Banners->add($banner);
            }
            
        }
        $this->layout->view('banners/create.php', $this->data);
    }
    
    public function edit($id){
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->data['banner'] = $this->Banners->one($id);
        $this->form_validation->set_message("required", "%s required");
        $this->data['id'] = $id;
        if ($this->form_validation->run() == false) {
            
        } else {
            $banner = array();
            $this->data['success'] = true;
            if (!empty($_FILES['image']['name'])){
                $file = $_FILES['image'];
                $name = time() . "_" . $file['name'];
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
                    $banner['image'] = $name;                   
                    
                    
                }
            }
            if($this->data['success'] == true){
                $banner['title'] = $this->input->post('title', true);
                $this->Banners->edit($banner, $id);
            }
            
            
            
        }
        $this->layout->view('banners/create.php', $this->data);
    }
}
