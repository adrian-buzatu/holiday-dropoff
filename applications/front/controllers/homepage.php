<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Banners_Model', 'Banners');
    }
    
    public function index()
    {
        $this->data['banners'] = $this->Banners->front_banners();
        
        $this->layout->view('homepage/index.php', $this->data);
    }
}
