<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
    }
    
    public function index()
    {
        
        $this->layout->view('homepage/index.php', $this->data);
    }
}
