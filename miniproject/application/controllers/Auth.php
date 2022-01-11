<?php

    defined('BASEPATH') OR exit('No direct script access allowed');


    class Auth extends CI_Controller{

        public function _remap($method, $param = array()){
            if(method_exists($this, $method)){
                call_user_func_array(array($this,$method), $param);
            }
            else{
                echo "Error";
                //404 view
            }
        }

        public function login($msg = ''){
            $this->load->view('auth/login');
        }

        public function validate(){

        }

        public function logout(){

        }
    }