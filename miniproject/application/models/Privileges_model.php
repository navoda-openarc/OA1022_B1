<?php

    class Privileges_model extends CI_Model{

        private $privilege_id;
        private $privilege_alias;
        private $privilege_name;
        private $description;


        function get_all_privileges(){
            $this->db->select('*');
            $this->db->from('privileges');

            $query = $this->db->get();

            return $query->result_array();
        }
    }

?>