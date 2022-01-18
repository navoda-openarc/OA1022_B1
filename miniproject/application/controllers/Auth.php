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
                        //echo "Passwords matches";
                        
                        $user_data = array(
                            'username' => $result[0]['u_name'],
                            'firstname' => $result[0]['f_name'],
                            'lastname' => $result[0]['l_name']
                        );

                        //SELECT `privileges`.`privilege_name`, `user_role_privileges`.`status` 
                        //FROM `privileges` JOIN `user_role_privileges` 
                        //ON `privileges`.`privilege_id` = `user_role_privileges`.`privilege_id`

                        $this->db->select('privilege_alias,status');
                        $this->db->from('privileges');
                        $this->db->join('user_role_privileges', 'privileges.privilege_id = user_role_privileges.privilege_id');
                        
                        $query = $this->db->get();

                        $permissions = array();

                        foreach($query->result_array() as $row){
                            $permissions[$row['privilege_alias']] = $row['status'];
                        }

                        $user_data['permissions'] = $permissions;

                        //Creating the session
                        $this->session->set_userdata($user_data);

                        redirect('home');
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
            $user_data = array('username','firstname','lastname','permissions');
            $this->session->unset_userdata($user_data);
            redirect('Auth/login');
        }
    }