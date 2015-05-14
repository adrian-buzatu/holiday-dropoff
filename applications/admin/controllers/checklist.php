<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of checklist
 *
 * @author shade
 */
class Checklist extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Checklist_Model', 'Checklist');
    }
    
    public function index()
    {        
        $configTable = $this->data['configTable'];
        $configTableCustom = array(
            'title' => 'Checklist',
            'headers' => array('Title'),
            'displayedFields' => array('name'), 
            'data' => $this->Checklist->get(),
            'links' => array(
                'name' => $configTable['editBaseUrl']. ',id'
            )
        );
        $configTable = array_merge($configTableCustom, $configTable);
        $this->data['list'] = $this->layout->table($configTable);
        $this->layout->view('checklist/index.php', $this->data);
    }
    
    public function create(){
        
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required|callback_is_name_unique');
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            $name = $this->input->post('name', true);
            $checklist = array(
                'name' => $name
                
            );
            $this->data['success'] = true;
            $this->Checklist->add($checklist);
        }
        $this->layout->view('checklist/create.php', $this->data);
    }
    
    public function edit($id){
        
        $this->data['success'] = false;
        $camp = $this->Checklist->getOne($id);
        $this->data['name'] = $camp['name'];
        $this->data['id'] = $id;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required|is_unique[camp_groups.name]');
        $this->form_validation->set_message("required", "%s required");
        $this->form_validation->set_message("is_unique", "%s is already Taken");
        if ($this->form_validation->run() == false) {
            
        } else {
            $name = $this->input->post('name', true);
            $checklist = array(
                'name' => $name
                
            );
            $this->data['success'] = true;
            $this->Checklist->update($checklist, array('id' => $id));
        }
        $this->layout->view('checklist/edit.php', $this->data);
    }
    
    public function delete($id){
        $this->Checklist->delete($id);
        redirect('checklist');
    }
}
