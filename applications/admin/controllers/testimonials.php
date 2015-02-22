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
class Testimonials extends CI_Controller {
    
     public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Testimonials_Model', 'Testimonials');
    }
    public function index()
    {        
        $configTable = $this->data['configTable'];
        $configTableCustom = array(
            'title' => 'Testimonials',
            'headers' => array('Content'),
            'displayedFields' => array('content_raw'),
            
            'data' => $this->Testimonials->get(),
            'links' => array(
                'content_raw' => $configTable['editBaseUrl']. ',id'
            )
        );
        $configTable = array_merge($configTableCustom, $configTable);
        $this->data['list'] = $this->layout->table($configTable);
        $this->layout->view('testimonials/index.php', $this->data);
    }
    
    public function create(){
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');        
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            $testimonial = array(
                'author_name' => $this->input->post('name', true),
                'content' => $this->input->post('content', true),
                'content_raw' => strip_tags($this->input->post('content', true)),
            );
            $this->data['success'] = true;
            $this->Testimonials->insert($testimonial);
            
        }
        $this->layout->view('testimonials/create.php', $this->data);
    }
    
    public function edit($id){
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->data['testimonial'] = $this->Testimonials->one($id);
        $this->form_validation->set_message("required", "%s required");
        $this->data['id'] = $id;
        if ($this->form_validation->run() == false) {
            
        } else {
            $this->data['success'] = true;
            
            $testimonial = array(
                'author_name' => $this->input->post('name', true),
                'content' => $this->input->post('content', true),
                'content_raw' => trim(strip_tags($this->input->post('content', true))),
            );
            $this->data['success'] = true;
            $this->Testimonials->update($testimonial, $id);
            
            
        }
        $this->layout->view('testimonials/edit.php', $this->data);
    }
    
    function delete($id){
        $this->Testimonials->delete($id);
        redirect('testimonials');
    }
}
