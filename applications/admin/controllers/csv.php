<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of flyer
 *
 * @author shade
 */
class Csv extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Docs_Model', 'Docs');
    }
    
    public function index()
    {
        $this->data['success'] = false;
        $this->data['csv'] = $this->Docs->getCsv();
        if (empty($_FILES)) {
            
        } else {
            $file = $_FILES['csv'];
            $name = time() . "_" . $file['name'];
            $config['upload_path'] = base_path(). "assets/front/images/uploads/";
            $config['allowed_types'] = '*';
            $config['max_size']	= '20480';
            $config['file_name'] = $name;
            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload('csv')) {
                $error = array('error' => $this->upload->display_errors());
                $this->data['success'] = false;
                $this->data['error'] = $error;

            } else {
                $fileData = $this->upload->data();
                chmod($fileData['full_path'],0777);                
                $this->Docs->setCsv($name);
                $this->data['success'] = true;
            }
            
        }
        $this->layout->view('csv/index.php', $this->data);
    }
}