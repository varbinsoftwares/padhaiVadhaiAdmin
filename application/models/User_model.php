<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function query_exe($query) {
        $query = $this->db->query($query);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data; //format the array into json data
        }
    }
}
?>