<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pdf { 

    function m_pdf() {
        $CI = & get_instance();
    }

    function load($param = NULL) {
        include_once APPPATH . '/third_party/mpdf/mpdf.php';

        return new mPDF('win-1252', 'A4', '', '', 10, 10, 20, 10, 0, 0);
    }

}
?>