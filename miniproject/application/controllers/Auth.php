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
            if($this->input->post('login') == "Login" && $this->input->post('username') != '' && $this->input->post('password') != ''){
                $username = $this->input->post('username');
                $password = sha1($this->input->post('password'));

                $this->load->model('User_model');

                $result = $this->User_model->searchUser(['u_name'], [$username]);

                if(count($result) == 1){
                    //Only One User
                    //Check the Password
                    if($result[0]['password'] == $password){
                        //Success
                        echo "Passwords matches";
                        
                        //18th <- Access User Roles
                    }
                    else{
                        redirect(base_url() . 'auth/login/invalid');
                    }
                }
                else{
                    redirect(base_url() . 'auth/login/invalid');
                }
            }
            else{
                redirect(base_url() . 'auth/login/invalid');
            }
        }

        public function logout(){

        }
    }