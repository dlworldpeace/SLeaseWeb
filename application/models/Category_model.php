<?php
    class Category_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        //retrieve array of all categories
        public function get_categories(){
            $query = $this ->db-> query("SELECT * FROM Categories;");
            return $query -> result_array();
        }

        public function get_categoriesname(){
            $query = $this ->db-> query("SELECT Name FROM Categories;");
            return $query -> result_array();
        }


        public function get_category($Cat_id) {
            $query = $this->db->query("SELECT Name FROM Categories WHERE Cat_id = '".$Cat_id."';");
            return $query->result_array();
        }
 
    }