<?php

    defined('BASEPATH') OR exit('No direct script access allowed');


    class Test6 extends CI_Controller{

        public function login($msg = ''){
            $data['msg'] = '';
            if($msg == 'invalid'){
                $data['msg'] = 'Invalid Username / Password';
            }
            $this->load->view('forms/login',$data);
        }

        public function validate(){
            if($this->input->post('submit') != '' && $this->input->post('username') != '' 
                && $this->input->post('password') != ''){
                //create session
                if($this->input->post('username') == 'navoda' && $this->input->post('password') == '123'){
                    $user_data = array(
                        'user_id' => 1,
                        'username' => $this->input->post('username'),
                        'firstname' => 'Navoda',
                        'lastname' => 'Kotugoda'
                    );

                    $this->session->set_userdata($user_data);

                    redirect('test6/home');
                }

            }
            else{
                redirect('test6/login/invalid');
            }

        }

        public function home(){
            //check whether the request is coming from a user with a session
            if($this->session->userdata('user_id') > 0){
                //session exists, therefore can view the home page
                echo "Working with sessions <br/>";
                echo "Hello " . $this->session->userdata('firstname') . ', Welcome back!';
                echo '<a href="'. base_url() . 'test6/logout"> Log Out</a>';
            }
            else{
                //session doesn't exists, therefore redirect to index page
                redirect('test6/login');
            }
        }

        public function logout(){
            $user_data = array('user_id','username','firstname','lastname');
            $this->session->unset_userdata($user_data);
            redirect('test6/home');
        }

    }
?>