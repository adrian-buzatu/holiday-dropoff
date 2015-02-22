<?php

class Gallerycategories extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Gallery_Categories_Model', 'Gallery_Categories');
    }
    
    public function index()
    {        
        $configTable = $this->data['configTable'];
        $configTableCustom = array(
            'title' => 'Gallery Categories',
            'headers' => array('Title'),
            'displayedFields' => array('name'), 
            'data' => $this->Gallery_Categories->get(),
            'links' => array(
                'name' => $configTable['editBaseUrl']. ',id'
            )
        );
        $configTable = array_merge($configTableCustom, $configTable);
        $this->data['list'] = $this->layout->table($configTable);
        $this->layout->view('gallery_categories/index.php', $this->data);
    }
    
    public function create(){
        
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required|callback_is_name_unique');
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            $name = $this->input->post('name', true);
            $galleryCategory = array(
                'name' => $name,
                
            );
            $this->data['success'] = true;
            $this->Gallery_Categories->add($galleryCategory);
        }
        $this->layout->view('gallery_categories/create.php', $this->data);
    }
    
    public function edit($id){
        
        $this->data['success'] = false;
        $camp = $this->Gallery_Categories->getOne($id);
        $this->data['name'] = $camp['name'];
        $this->data['id'] = $id;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required|is_unique[camp_groups.name]');
        $this->form_validation->set_message("required", "%s required");
        $this->form_validation->set_message("is_unique", "%s is already Taken");
        if ($this->form_validation->run() == false) {
            
        } else {
            $name = $this->input->post('name', true);
            $galleryCategory = array(
                'name' => $name,
                
            );
            $this->data['success'] = true;
            $this->Gallery_Categories->update($galleryCategory, array('id' => $id));
        }
        $this->layout->view('gallery_categories/edit.php', $this->data);
    }
    
    public function delete($id){
        $this->Gallery_Categories->delete($id);
        redirect('gallerycategories');
    }
}