<?php

    class User_model extends CI_Model{

        private $u_id;
        private $u_name;
        private $f_name;
        private $l_name;
        private $age;
        private $status;
        private $password;
        private $created_timestamp;
        private $last_logged_timestamp;
        private $user_role;

        
        function searchUser($fields = array(), $fieldValues = array()){
            $count = count($fields);

            if($count > 0){
                $this->db->select('*');
                $this->db->from('user');
                for($i = 0; $i < $count; $i++){
                    $this->db->where($fields[$i], $fieldValues[$i]);
                }

                $query = $this->db->get();

                if($query && $query->num_rows() > 0){
                    return $query->result_array();
                }
                else{
                    return array();
                }
            }
            else{
                return array();
            }
        }

        function createUser($record){
            $data = array(
                'u_name' => $record['username'],
                'f_name' => $record['firstname'],
                'l_name' => $record['lastname'],
                'age' => $record['age'],
                'status' => 1,
                'password' => sha1($record['password']),
                'last_logged_timestamp' => '0000-00-00 00:00:00',
                'user_role' => $record['usertype']
            );
            
            $query = $this->db->insert('user',$data);

            return $this->db->insert_id();
        }

        function getUsers($fields = array()){
            $count = count($fields);

            if($count > 0){
                $fieldsList = "";
                for($i = 0; $i < $count; $i++){
                    $fieldsList .= "`". $fields[$i] . "`";
                    if($i < $count-1){
                        $fieldsList .= ",";
                    }
                }
                $this->db->select($fieldsList);
                $this->db->from('user');
                $query = $this->db->get();

                if($query && $query->num_rows() > 0){
                    return $query->result_array();
                }
                else{
                    return array();
                }
            }
            else{
                return array();
            }
        }
    }

?>