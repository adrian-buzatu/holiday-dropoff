<?php

class Order extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Order_Model', 'Order');
    }
    
    public function index()
    {        
        $configTable = $this->data['configTable'];
        $configTableCustom = array(
            'title' => 'Orders',
            'headers' => array('First Name', 'Last Name', 'Order Total', 'Date'),
            'displayedFields' => array('first_name', 'last_name', 'total', 'date'),
            'fieldFunctions' => array(
                'date' => 'echo date("Y-m-d", {field});'
            ),
            'data' => $this->Order->get(),
            'links' => array(
                'first_name' => $configTable['viewBaseUrl']. ',id',
                'last_name' => $configTable['viewBaseUrl']. ',id',
                'date' => $configTable['viewBaseUrl']. ',id'
            ),
            'customCrudOptions' => array(
                'view' => 'viewBaseUrl'
            )
        );
        $configTable = array_merge($configTableCustom, $configTable);
        $this->data['list'] = $this->layout->table($configTable);
        $this->layout->view('order/index.php', $this->data);
    }
    
    
}