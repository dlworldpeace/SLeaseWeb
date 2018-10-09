<?php
    class Item_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function get_items() {
            $query = $this->db->query('SELECT * FROM Items;');
            return $query->result_array();
        }

        

    }