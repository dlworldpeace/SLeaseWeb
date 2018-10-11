<?php
    class Category_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function get_category($Cat_id = FALSE) {
            if($Cat_id === FALSE) {
                $query = $this->db->query('SELECT * FROM Categories;');
                return $query->result_array();
            }

            $query = $this->db->query("SELECT * FROM Categories WHERE Cat_id = '".$Cat_id."';");
            return $query->result_array();
        }
 
    }