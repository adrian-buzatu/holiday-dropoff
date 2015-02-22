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
class Coupons extends CI_Controller {
    
     public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Coupons_Model', 'Coupons');
    }
    public function index()
    {        
        $configTable = $this->data['configTable'];
        $configTableCustom = array(
            'title' => 'Coupons',
            'headers' => array('Name', 'Description', 'Code', 'Amount', 'Type', 'Start Date', 'End Date', 'Use'),
            'displayedFields' => array('name', 'description', 'code', 'amount', 'type', 'start_date', 'end_date', 'use'),
            'fieldFunctions' => array(
                'start_date' => 'echo date("Y-m-d", {field});',
                'end_date' => 'echo date("Y-m-d", {field});'
            ),
            'data' => $this->Coupons->get(),
            'links' => array(
                'name' => $configTable['editBaseUrl']. ',id'
            )
        );
        $configTable = array_merge($configTableCustom, $configTable);
        $this->data['list'] = $this->layout->table($configTable);
        $this->layout->view('coupons/index.php', $this->data);
    }
    
    public function create(){
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('code', 'Code', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');
        $this->form_validation->set_rules('use', 'Use', 'required|is_numeric|greater_than[0]');
        $this->form_validation->set_message("required", "%s required");
        if ($this->form_validation->run() == false) {
            
        } else {
            
            $coupon = array(
                'name' => $this->input->post('name', true),
                'description' => $this->input->post('description', true),
                'amount' => $this->input->post('amount', true),
                'code' => $this->input->post('code', true),
                'type' => $this->input->post('type', true),
                'start_date' => strtotime($this->input->post('start_date', true)),
                'end_date' => strtotime($this->input->post('end_date', true)),
                'use' => $this->input->post('use', true)
            );
            $this->data['success'] = true;
            $this->Coupons->add($coupon);
            
        }
        $this->layout->view('coupons/create.php', $this->data);
    }
    
    public function edit($id){
        $this->data['success'] = false;
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_error_delimiters('<div class="form_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('code', 'Code', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');
        $this->form_validation->set_rules('use', 'Use', 'required|is_numeric|greater_than[0]');
        $this->data['coupon'] = $this->Coupons->one($id);
        $this->form_validation->set_message("required", "%s required");
        $this->data['id'] = $id;
        if ($this->form_validation->run() == false) {
            
        } else {
            $coupon = array(
                'name' => $this->input->post('name', true),
                'description' => $this->input->post('description', true),
                'code' => $this->input->post('code', true),
                'amount' => $this->input->post('amount', true),
                'type' => $this->input->post('type', true),
                'start_date' => strtotime($this->input->post('start_date', true)),
                'end_date' => strtotime($this->input->post('end_date', true)),
                'use' => $this->input->post('use', true)
            );
            $this->data['success'] = true;
            $this->Coupons->update($coupon, $id);
            
        }
        $this->layout->view('coupons/edit.php', $this->data);
    }
    
    function delete($id){
        $this->Coupons->delete($id);
        redirect('coupons');
    }
}
