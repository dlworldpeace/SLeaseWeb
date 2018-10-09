<?php
    class Item_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function get_items($item_id = FALSE) {
            if($item_id === FALSE) {
                $query = $this->db->query("SELECT * FROM Items WHERE Item_id = '$item_id'");
                return $query->result(); 
            }

            $query = $this->db->query('SELECT * FROM Items;');
            return $query->result_array();
        }

        

    }