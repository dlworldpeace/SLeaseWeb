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
        
        public function change_name($email) {
            $user_name = $this->input->post('displayname');
            $sql = "UPDATE Users SET User_name='".$user_name."' WHERE Email = '".$email."';";
            return $this->db->query($sql);
        }     

        public function change_password($email) {
            $password = $this->input->post('password');
            $sql = "UPDATE Users SET Password='".$password."' WHERE Email = '".$email."';";
            return $this->db->query($sql);
        }
    }