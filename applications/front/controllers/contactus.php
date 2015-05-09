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
        $this->load->model('Settings_Model', 'Settings');
    }
    
    public function index(){
        $this->data['workForUs'] = $this->Pages->getBySlug('work-for-us');
        $address = $this->data['address'] = $this->Settings->getAddress();
        $address_no_br = trim(preg_replace('/\s+/', ' ', $address));
        $address_gmap = urlencode($address_no_br);
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address_gmap}";
        // get the json response
        $resp_json = file_get_contents($url);

        // decode the json
        $resp = json_decode($resp_json, true);
        $this->data['addressUrl'] = '';
        // response status will be 'OK', if able to geocode given address 
        if ($resp['status'] = 'OK' && isset($resp['results'][0])) {
            //pr($resp['results'][0], 1);
            // get the important data
            $lati = $resp['results'][0]['geometry']['location']['lat'];
            $longi = $resp['results'][0]['geometry']['location']['lng'];
            $this->data['addressUrl'] = 
                    $resp['results'][0]['formatted_address']."&t=m&z=14&ll=". $lati. ",". $longi;

        }
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