<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
    }
    
    public function index()
    {
        $this->load->model('Newsletter_Model', 'Newsletter');
        $msg = "The email is either invalid or exists in the database";
        if($this->Newsletter->setEmail($this->input->post('newsEmail'))->insert() === true){
            $msg = "Your email was added succesfully";
        }
        $this->data['msg'] = $msg;
        $this->layout->view('newsletter/index', $this->data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */