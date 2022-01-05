<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class User_model extends CI_Model{

        function createRecord($record){
            $firstname = $record['firstname'];
            $lastname = $record['lastname'];
            $city = $record['city'];

            $result = $this->db->query("INSERT INTO `user` (`user_firstname`, `user_lastname`, `user_city`) 
                VALUES ('$firstname', '$lastname', '$city');");

            return $result;
        }
    }
?>