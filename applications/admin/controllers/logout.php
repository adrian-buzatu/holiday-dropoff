<?php

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        unset($_SESSION['username']);
        redirect('login');
    }

}
