<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Test5 extends CI_Controller{

        public function insert($firstname, $lastname, $city){
            //Loading the model which was created
            $this->load->model('User_model');

            $data = array('firstname' => $firstname, 'lastname' => $lastname, 'city' => $city);

            //Insert data
            $result = $this->User_model->createRecord($data);

            if($result > 0){
                echo "Data inserted successfully!";
            }
            else{
                echo "Fail to insert data";
            }

        }

    }
?>