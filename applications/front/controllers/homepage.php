<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Banners_Model', 'Banners');
        $this->load->model('Pages_Model', 'Pages');
        $this->load->model('Docs_Model', 'Docs');
         
        
    }
    
    public function index()
    {
        $this->data['banners'] = $this->Banners->front_banners();
        $this->data['flyer'] = $this->Docs->getFlyer();
        $page = $this->data['page'] = $this->Pages->getBySlug('home');
        $this->layout->view('homepage/index.php', $this->data);
    }
}
