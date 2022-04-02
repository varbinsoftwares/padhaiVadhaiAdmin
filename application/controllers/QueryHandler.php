<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class QueryHandler extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function index() {
        $this->all_query();
    }

    function all_query() {
   $query = " select * from (select paq.*, au.name, au.mobile_no, au.email,
   (select count(id)  from channel_message_personal as cm where cm.channel_id = paq.id and admin_seen = '0')  as unseen, 
   (select id   from channel_message_personal as cm where cm.channel_id = paq.id and admin_seen = '0' order by id desc limit 0, 1)  as last_m 
    from padai_ask_query as paq 
    join app_users as au on au.id = paq.user_id 
   
    order by paq.id desc) as a order by last_m desc";

        $data['data'] = $this->Product_model->query_exe($query);
        $this->load->view('queryManager/queryReport', $data);
    }

    function delete_query($query_id) {
        $this->Product_model->delete_table_information('padai_ask_query', 'id', $query_id);
        $this->Product_model->delete_table_information('channel_message_personal', 'channel_id', $query_id);
        redirect('QueryHandler/all_query');
    }

    function query_chat($query_id) {
        $query = " select paq.*, au.name, au.mobile_no, au.email from padai_ask_query as paq "
                . "join app_users as au on au.id = paq.user_id where paq.id =  $query_id  order by paq.id desc ";
        $dataq = $this->Product_model->query_exe($query);
        $query1 = " select * from auth_user where id =  1 ";
        $data1 = $this->Product_model->query_exe($query1);
        $recvr_id = $dataq[0]['user_id'];
        $data = $dataq[0];


        $data['receiver_id'] = $recvr_id;
        $data['channel_id'] = $query_id;
        $data['username'] = $data1[0]['username'];

        $this->load->view('queryManager/queryChat', $data);
    }

    function app_downloads() {
        $query = " select paq.*, au.name, au.mobile_no, au.email from gcm_registration as paq "
                . "left join app_users as au on au.id = paq.user_id order by paq.id desc";
        $data['data'] = $this->Product_model->query_exe($query);
        $this->load->view('queryManager/downloadUsers', $data);
    }

    function app_users() {
        $query = " select * from app_users order by id desc";
        $data['data'] = $this->Product_model->query_exe($query);
        $this->load->view('queryManager/appUsers', $data);
    }

   function sendNotification() {
        $query = " select * from app_users order by id desc";
        $data['data'] = $this->Product_model->query_exe($query);
        $this->load->view('queryManager/queryChatnot', $data);
    }

    function add_user() {
        if (isset($_POST['submit'])) {

            $user_type= $this->input->post('user_type');
            $password = $this->input->post('password');
            $pwd = md5($password);
            $first_name= $this->input->post('first_name');
            $last_name= $this->input->post('last_name');
            $email = $this->input->post('email');
            $post_data = array('first_name'=> $first_name,'last_name'=>$last_name,'email '=>$email ,'user_type'=>$user_type,'password'=>$pwd);
            $this->db->insert('auth_user',$post_data);
            redirect('QueryHandler/all_query');
           }
          $this->load->view('queryManager/addUser');
    }
    function test(){
        
    }


}
