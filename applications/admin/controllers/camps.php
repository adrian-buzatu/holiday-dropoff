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
            'headers' => array('Title', 'Start Date', 'End Date', 'Extra Details', 'Creation Date'),
            'displayedFields' => array('name', 'start_date', 'end_date', 'details', 'date_created'),
            'fieldFunctions' => array(
                'start_date' => 'echo date("Y-m-d", {field});',
                'end_date' => 'echo date("Y-m-d", {field});',
                'date_created' => 'echo date("Y-m-d", {field});'
            ),
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
        $this->data['campGroups'] = $this->Camps->getCampGroupsForForm();
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required|is_unique[camps.name]');
        $this->form_validation->set_rules('price[]', 'Price', 'required|numeric');
        $this->form_validation->set_message("is_unique", "%s is already Taken");
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            
            $name = $this->input->post('name', true);
            $extra_days_fee = (float)$this->input->post('extra_days_fee', true);
            if($extra_days_fee === 0){
                $extra_days_fee = 5;
            }
            $campGroup = array(
                'name' => $name,
                'start_date' => strtotime($this->input->post('start_date', true)),
                'end_date' => strtotime($this->input->post('end_date', true)),
                'date_created' => time(),
                'date_updated' => time(),
                'details' => $this->input->post('details', true),
                'camp_group_id' => (int)$this->input->post('camp_group_id', true),
                'extra_days_fee' => $extra_days_fee,
                'status' => 1,
                
            );
            $this->data['success'] = true;
            $campId = $this->Camps->add($campGroup);
            $this->Camps->addCampPrices($this->input->post('price'), $campId);
        }
        $this->layout->view('camps/create.php', $this->data);
    }
    
    public function edit($id){
        $this->data['campGroups'] = $this->Camps->getCampGroupsForForm();
        $this->data['success'] = false;
        $camp = $this->Camps->getOne($id);
        $this->data['camp'] = $camp;
        $this->data['campId'] = $id;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        
        if(!empty($_POST) && $camp['name'] != $_POST['name']){
            $this->form_validation->set_rules('name', 'Name', 'required|is_unique[camps.name]');
        }
        $this->form_validation->set_rules('extra_days_fee', 'Extra Days Fee', 'required|numeric');
        //$this->form_validation->set_rules('price[]', 'Price', 'required|numeric');
        $this->form_validation->set_message("is_unique", "%s is already Taken");
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
           
            $extra_days_fee = (float)$this->input->post('extra_days_fee', true);
            if($extra_days_fee === 0){
                $extra_days_fee = 5;
            }
            $name = $this->input->post('name', true);
            $campGroup = array(
                'name' => $name,
                'extra_days_fee' => $extra_days_fee,
                'start_date' => strtotime($this->input->post('start_date', true)),
                'end_date' => strtotime($this->input->post('end_date', true)),
                'date_created' => time(),
                'date_updated' => time(),
                'camp_group_id' => $this->input->post('camp_group_id'),
                'details' => $this->input->post('details', true),
                'camp_group_id' => (int)$this->input->post('camp_group_id', true),
                'status' => 1,
                'created_by' => 1,
                
            );
            $this->data['success'] = true;
            $this->Camps->update($campGroup, array('id' => $id));
            if($this->input->post('price')){
                $this->Camps->addCampPrices($this->input->post('price'), $id);
            }
            
        }
        $this->layout->view('camps/edit.php', $this->data);
    }
    
    public function delete($id){
        $this->Camps->delete($id);
        redirect('camps');
    }
    
    public function set_prices(){
        $this->data['startDate'] = strtotime($this->input->post('start_date', true));
        $this->data['endDate'] = strtotime($this->input->post('end_date', true));
        $camp = $this->Camps->getOne((int)$this->input->post('camp_id'));
        if($camp === false){
            $this->data['camp'] = array();
        } else {
            $this->data['camp'] = $camp['prices'];
        }
        
        $html = $this->load->view('camps/partial/camp_prices', $this->data, true);
        echo json_encode(
            array(
                'success' => true,
                'output' => $html,
            )
        );
    }
}