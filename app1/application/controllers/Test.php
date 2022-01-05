<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Test extends CI_Controller{

        public function index(){
            echo "Welcome to CodeIgniter";
        }

        public function xyz(){
            echo "Calling a method inside test controller";
        }
    }

?>