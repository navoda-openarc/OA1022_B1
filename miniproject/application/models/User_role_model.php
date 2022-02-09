<?php

    class User_role_model extends CI_Model{

        private $role_id;
        private $role_name;
        private $status;

        function getAllUserRoles(){
            $this->db->select('*');
            $this->db->from('user_role');
            $query = $this->db->get();

            if($query && $query->num_rows() > 0){
                return $query->result_array();
            }
            else{
                return array();
            }
        }
    }

?>