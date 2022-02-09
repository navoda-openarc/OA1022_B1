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


    }

?>