<?php
    class User_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function get_user($email) {
            $query = $this->db->query("SELECT * FROM Users WHERE Email = '".$email."';")->result_array();
            return reset($query);
        }

        public function get_ongoing_items($email) {
            $query = $this->db->query("SELECT * FROM Items WHERE Owner = '".$email."' AND Fromdate > CURRENT_TIMESTAMP;");
            return $query->result_array();
        }

        public function get_completed_items($email) {
            $query = $this->db->query("SELECT * FROM Items WHERE Owner = '".$email."' AND Fromdate < CURRENT_TIMESTAMP;");
            return $query->result_array();
        }
        
        public function update_user($email) {
            $data= array(
                'item_name' => $this->input->post('item_name'),
                'description' => $this->input->post('description'),
                'image' => '', //$imageUri,
                'pickup_location' => $this->input->post('pickup_location'),                
                'pickup_region' => $this->input->post('pickup_region'),
                'category' => (int)$this->input->post('category')
            );
            $sql = "UPDATE Items SET 
                Item_name = ?, 
                Description = ?, 
                Image = ?, 
                Pickup_location = ?, 
                Pickup_region = ?, 
                Categories = ?
                WHERE Item_id= ".$item_id.";";
            return $this->db->query($sql, $data);
        }
    }