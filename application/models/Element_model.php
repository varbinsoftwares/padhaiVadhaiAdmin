<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Element_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    
     
}
?>