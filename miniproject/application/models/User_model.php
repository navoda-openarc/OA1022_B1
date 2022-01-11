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
    }

?>