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
    public function index()
    {        
        $configTable = $this->data['configTable'];
        $configTableCustom = array(
            'title' => 'News',
            'headers' => array('Title', 'Content'),
            'displayedFields' => array('title', 'content_raw'),
            
            'data' => $this->News->get(),
            'links' => array(
                'content_raw' => $configTable['editBaseUrl']. ',id'
            )
        );
        $configTable = array_merge($configTableCustom, $configTable);
        $this->data['list'] = $this->layout->table($configTable);
        $this->layout->view('news/index.php', $this->data);
    }
    
    public function create(){
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required'); 
        
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            if (!empty($_FILES['image']['name'])){
                $file = $_FILES['image'];
                $name = time() . "_" . $file['name'];
                $config['upload_path'] = base_path() . "assets/front/images/";
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
                    $testimonial = array(
                        'title' => $this->input->post('title', true),
                        'slug' => url_title($this->input->post('title'), '-'),
                        'content' => $this->input->post('content'),
                        'content_raw' => trim(
                                strip_tags(
                                    preg_replace(
                                        "/&#?[a-z0-9]+;/i","", $this->input->post('content', true)
                                    )
                                )
                        ),
                        'image' => $name
                    );
                    $this->data['success'] = true;
                    $this->News->insert($testimonial);
                }
            } else {
                $testimonial = array(
                    'title' => $this->input->post('title', true),
                    'slug' => url_title($this->input->post('title'), '-'),
                    'content' => $this->input->post('content'),
                    'content_raw' => trim(strip_tags($this->input->post('content', true)))
                );
                $this->data['success'] = true;
                $this->News->insert($testimonial);
            }
            
            
            
        }
        $this->layout->view('news/create.php', $this->data);
    }
    
    public function edit($id){
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->data['testimonial'] = $this->News->one($id);
        $this->form_validation->set_message("required", "%s required");
        $this->data['id'] = $id;
        if ($this->form_validation->run() == false) {
            
        } else {
            
            $this->data['success'] = true;
            $testimonial = array(
                'title' => $this->input->post('title', true),
                'slug' => url_title($this->input->post('title'), '-'),     
                'content' => $this->input->post('content'),
                'content_raw' => trim(
                        strip_tags(
                            preg_replace(
                                "/&#?[a-z0-9]+;/i","", $this->input->post('content', true)
                            )
                        )
                ),
            );
            if (!empty($_FILES['image']['name'])){
                $file = $_FILES['image'];
                $name = time() . "_" . $file['name'];
                $config['upload_path'] = base_path() . "assets/front/images/";
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
                    $testimonial['image'] = $name; 
                }
            }
            if($this->data['success'] == true){
                $this->News->update($testimonial, $id);
            } 
        }
        $this->layout->view('news/edit.php', $this->data);
    }
    
    function delete($id){
        $this->News->delete($id);
        redirect('news');
    }
}
