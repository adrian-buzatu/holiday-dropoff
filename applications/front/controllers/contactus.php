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
class Contactus extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Pages_Model', 'Pages');
    }
    
    public function index(){
        $this->data['workForUs'] = $this->Pages->getBySlug('work-for-us');
        $this->layout->view('contactus/index.php', $this->data);
    }
    
    function process(){
        $to = "adrian.t.buzatu@gmail.com";
        $subject = $this->input->post('subject');
        $message = $this->input->post('msg').
                                ", \r\n".$this->input->post("name")."(".$this->input->post('email').")";
        $from = "From:".$this->input->post('email');
        if($subject == "" || $this->input->post('msg') == "" 
                || $this->input->post("name") == '' 
                || $this->input->post('email') == ''){
            echo json_encode(array('success' => false));exit;
        }
        $headers = 'From:'. $this->input->post('email') . "\r\n"; 

//        $this->load->library('email');
//
//        $this->email->from($this->input->post('email'));
//        $this->email->to($to); 
//
//        $this->email->subject($subject);
//        $this->email->message($message);	
//
//        $this->email->send();
        mail($to, $subject, $message, $headers);
        //echo $this->email->print_debugger();
        echo json_encode(array('success' => true));
    }
    
}