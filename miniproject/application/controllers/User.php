<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Controller{

        public function _remap($method, $param = array()){
            if(method_exists($this, $method)){
                call_user_func_array(array($this,$method), $param);
            }
            else{
                echo "Error";
                //404 view
            }
        }

        public function create(){
            if($this->session->userdata('u_id') > 0){
                $this->load->view('common/common_home_header');
                $this->load->view('common/common_body_top');
                $this->load->view('common/navigation_bar');
                //permission check
                if($this->session->userdata('permissions')['create_user']){
                    $this->load->model('User_role_model');
                    $data['userTypes'] = $this->User_role_model->getAllUserRoles();

                    $this->load->view('user/user_form',$data);
                }
                else{

                }
                $this->load->view('common/common_body_bottom');
            }
            else{
                redirect('Auth/login');
            }
            
        }

        public function list(){
            if($this->session->userdata('u_id') > 0){
                if($this->session->userdata('permissions')['create_user']){
                    $this->load->model('User_model');
                    $result = $this->User_model->getUsers(array('u_id','u_name'));
                    print_r($result);
                }
                else{

                }
            }
            else{
                redirect('Auth/login');
            }
        }

        public function process($operation){
            if($this->session->userdata('u_id') > 0){
                $operation = strtolower($operation);

                $record = array();

                if($this->input->post('inputUsername') !== null){
                    $record['username'] = $this->input->post('inputUsername');
                }
                if($this->input->post('inputFirstname') !== null){
                    $record['firstname'] = $this->input->post('inputFirstname');
                }
                if($this->input->post('inputLastname') !== null){
                    $record['lastname'] = $this->input->post('inputLastname');
                }
                if($this->input->post('inputPassword') !== null){
                    $record['password'] = $this->input->post('inputPassword');
                }
                if($this->input->post('inputRePassword') !== null){
                    $record['repassword'] = $this->input->post('inputRePassword');
                }
                if($this->input->post('inputAge') !== null){
                    $record['age'] = $this->input->post('inputAge');
                }
                if($this->input->post('inputUser') !== null){
                    $record['usertype'] = $this->input->post('inputUser');
                }

                if($operation == "create" 
                    && $this->session->userdata('permissions')['create_user']
                    && $this->validateUser()){
                    
                    $this->load->model('User_model');
                    
                    $result = $this->User_model->createUser($record);

                    if($result){
                        //MessageBox Success
                        echo "<br/> User Created Successfully";
                    }
                    else{
                        echo "<br/> User Creation Failed";
                    }
                }
                else{
                    echo "Unable to Create";
                }
                
                /*
                $this->load->view('common/common_home_header');
                $this->load->view('common/common_body_top');
                $this->load->view('common/navigation_bar');
                //permission check
                if($this->session->userdata('permissions')['create_user']){

                }
                $this->load->view('common/common_body_bottom');*/

            }
            else{
                redirect('Auth/login');
            }
        }

        private function validateUser(){
            if(true){
                return true;
            }
            else{
                return false;
            }
        }


    }

?>