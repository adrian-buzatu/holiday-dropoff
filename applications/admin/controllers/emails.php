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
class Emails extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Emails_Model', 'Emails');
    }
    
    public function index()
    {        
        $this->layout->view('emails/index.php', $this->data);
    }
    
    public function edit($slug = ''){
        $page = $this->Emails->getBySlug($slug);
        if($page != false){
            $this->data['email'] = $page;
        } else {
            $this->data['email'] = array(
                
                'title' => '',
                'content' => '',
                'attachment' => ''
            );
            
        }
        $this->data['slug'] = $slug;
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            $name = '';
            if (!empty($_FILES['attachment']['name'])) {
                $file = $_FILES['attachment'];
                $name = time() . "_" . slugify_filename($file['name']);
                $config['upload_path'] = base_path() . "assets/front/images/docs/";
                $config['allowed_types'] = 'doc|pdf|xls|docx|xlsx';
                $config['max_size'] = '120480';
                $config['file_name'] = $name;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('attachment')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->data['success'] = false;
                    $this->data['error'] = $error['error'];
                } else {
                    $fileData = $this->upload->data();
                    chmod($fileData['full_path'], 0777);                    
                }
            }
            $content = $this->input->post('content');
            $content_raw = strip_tags($content);
            $up = array(
                'title' => $this->input->post('title', true),
                'date_updated' => time(),
                'status' => 1,           
                'attachment' => $name,
                'content' => $content,
                'content_raw' => $content_raw
            );
            $this->data['success'] = true;
            $this->Emails->updateTemplate($up, array('slug' => $slug));
        }
        $this->layout->view('emails/edit.php', $this->data);
    }
    
    public function add(){
        
    }
    
    public function delete(){
        
    }
}