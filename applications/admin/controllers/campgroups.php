<?php

class Campgroups extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Camp_Groups_Model', 'Camp_Groups');
    }
    
    public function index()
    {        
        $configTable = $this->data['configTable'];
        $configTableCustom = array(
            'title' => 'Camp Groups',
            'headers' => array('Title'),
            'displayedFields' => array('name'), 
            'data' => $this->Camp_Groups->get(),
            'links' => array(
                'name' => $configTable['editBaseUrl']. ',id'
            )
        );
        $configTable = array_merge($configTableCustom, $configTable);
        $this->data['list'] = $this->layout->table($configTable);
        $this->layout->view('camp_groups/index.php', $this->data);
    }
    
    public function create(){
        
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required|callback_is_name_unique');
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            $name = $this->input->post('name', true);
            $campGroup = array(
                'name' => $name,
                'status' => 1,
                
            );
            $this->data['success'] = true;
            $this->Camp_Groups->add($campGroup);
        }
        $this->layout->view('camp_groups/create.php', $this->data);
    }
    
    public function edit($id){
        
        $this->data['success'] = false;
        $camp = $this->Camp_Groups->getOne($id);
        $this->data['name'] = $camp['name'];
        $this->data['id'] = $id;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required|is_unique[camp_groups.name]');
        $this->form_validation->set_message("required", "%s required");
        $this->form_validation->set_message("is_unique", "%s is already Taken");
        if ($this->form_validation->run() == false) {
            
        } else {
            $name = $this->input->post('name', true);
            $campGroup = array(
                'name' => $name,
                'status' => 1,
                
            );
            $this->data['success'] = true;
            $this->Camp_Groups->update($campGroup, array('id' => $id));
        }
        $this->layout->view('camp_groups/edit.php', $this->data);
    }
    
    public function delete($id){
        $this->Camp_Groups->delete($id);
        redirect('campgroups');
    }
}