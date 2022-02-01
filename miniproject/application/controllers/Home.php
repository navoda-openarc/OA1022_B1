<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller{

        function index(){
            $this->load->view('common/common_home_header');
            $this->load->view('common/common_body_top');
            $this->load->view('common/navigation_bar');
            $this->load->view('home/home');
            $this->load->view('common/common_body_bottom');

            //$this->load->view('test/test_home');

            //print_r($this->session->userdata);
        }
    }

?>