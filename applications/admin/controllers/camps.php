<?php

class Camps extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Camps_Model', 'Camps');
    }
    
    public function index()
    {        
        $configTable = $this->data['configTable'];
        $configTableCustom = array(
            'title' => 'Camps',
            'headers' => array('Title', 'Start Date', 'End Date', 'Extra Date', 'Creation Date'),
            'displayedFields' => array('name'), 
            'data' => $this->Camps->get(),
            'links' => array(
                'name' => $configTable['editBaseUrl']. ',id'
            )
        );
        $configTable = array_merge($configTableCustom, $configTable);
        $this->data['list'] = $this->layout->table($configTable);
        $this->layout->view('camps/index.php', $this->data);
    }
    
    public function create(){
        
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price[]', 'Price', 'required|numeric');
        $this->form_validation->set_rules('start_date', 'Name', 'required|is_unique[camp_groups.name]');
        $this->form_validation->set_message("is_unique", "%s is already Taken");
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            $name = $this->input->post('name', true);
            $campGroup = array(
                'name' => $name,
                'start_date' => strtotime($this->input->post('start_date', true)),
                'end_date' => strtotime($this->input->post('end_date', true)),
                'date_created' => time(),
                'date_updated' => time(),
                'camp_group_id' => $this->input->post('camp_group_id'),
                'status' => 1,
                
            );
            $this->data['success'] = true;
            $campId = $this->Camps->add($campGroup);
            $this->Camps->addPrices($this->input->post('price'), $campId);
        }
        $this->layout->view('camps/create.php', $this->data);
    }
    
    public function edit($id){
        
        $this->data['success'] = false;
        $camp = $this->Camps->getOne($id);
        $this->data['camp'] = $camp;
        $this->data['id'] = $id;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price[]', 'Price', 'required|numeric');
        $this->form_validation->set_rules('start_date', 'Name', 'required|is_unique[camp_groups.name]');
        $this->form_validation->set_message("is_unique", "%s is already Taken");
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            $name = $this->input->post('name', true);
            $campGroup = array(
                'name' => $name,
                'start_date' => strtotime($this->input->post('start_date', true)),
                'end_date' => strtotime($this->input->post('end_date', true)),
                'date_created' => time(),
                'date_updated' => time(),
                'camp_group_id' => $this->input->post('camp_group_id'),
                'status' => 1,
                
            );
            $this->data['success'] = true;
            $this->Camps->update($campGroup, array('id' => $id));
            $this->Camps->addPrices($this->input->post('price'), $id);
        }
        $this->layout->view('camps/edit.php', $this->data);
    }
    
    public function delete($id){
        $this->Camps->delete($id);
        redirect('admin/camps');
    }
}