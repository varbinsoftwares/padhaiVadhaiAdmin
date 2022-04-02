<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start(); 
class Dashboard_management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model'); 
    }

    public function index() {
         redirect('Reports/user_order_date');
        $this->load->view('dashboardManagement/dashboard');
    }
    

}
?>