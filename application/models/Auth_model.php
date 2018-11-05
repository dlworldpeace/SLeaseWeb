<?php
    class Auth_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function get_users($email = FALSE) {
            if($email === FALSE) {
                $query = $this->db->query('SELECT * FROM Users;');
                return $query->result_array();
            }

            $query = $this->db->query("SELECT * FROM Users WHERE Email = '".$email."';");
            return $query->result_array();
        }
        
        public function create_user() {
            $data= array(
                'email' => $this->input->post('email'),
                'username' => $this->input->post('displayname'),
                'password' => $this->input->post('password')
            );
            $sql = "INSERT INTO Users VALUES(?,?,?,0);"; // a new user by default cannot be admin.
            return $this->db->query($sql, $data);
        }

        public function check_if_email_exists($email) {
            $result = $this->db->query("SELECT * FROM Users WHERE Email = '".$email."';");
            if($result->num_rows() > 0) {
                return FALSE;
            } else {
                return TRUE;
            }
        }

        public function validate() {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            return $this->db->query("SELECT isAdmin FROM Users WHERE Email = '".$email."' AND Password = '".$password."';");
        }

        public function delete_account($email) {
            $this->db->query("DELETE FROM Users WHERE Email = '".$email."';");
            return true;
        }
    }