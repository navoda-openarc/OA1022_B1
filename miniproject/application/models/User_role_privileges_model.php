<?php

    class User_role_privileges_model extends CI_Model{

        private $role_id;
        private $privilege_id;
        private $status;


        function find_privileges_by_roleId($role_id){
            $this->db->select('privilege_id, status');
            $this->db->from('user_role_privileges');
            $this->db->where('role_id', $role_id);

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