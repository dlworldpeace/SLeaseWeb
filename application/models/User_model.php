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

        public function get_sucbids($email) {
            $sql = "SELECT i1.Item_name, i1.Item_id, i1.Fromdate, i1.Todate, b1.Rate
                        FROM Bids b1
                        INNER JOIN Items i1 ON b1.Item_id = i1.Item_id 
                        INNER JOIN Users u ON b1.Email = u.Email
                        WHERE b1.Email = '".$email."'
                        AND i1.Fromdate < CURRENT_TIMESTAMP
                        AND b1.Rate >= ALL(SELECT b2.Rate
                                                FROM Bids b2
                                                WHERE b1.Item_id = b2.Item_id)
                        ORDER BY i1.Todate DESC;";
            return $this->db->query($sql)->result_array();
        }

        public function get_ongoingbids($email) {
            $sql = "SELECT i1.Item_name, i1.Item_id, i1.Fromdate, b1.Rate, b2.Maximum
                        FROM Bids b1
                        INNER JOIN Items i1 ON b1.Item_id = i1.Item_id 
                        INNER JOIN Users u ON b1.Email = u.Email 
                        INNER JOIN (
                            SELECT Item_id, MAX(Rate) as Maximum
                            FROM Bids
                            GROUP BY Item_id
                            ) b2 ON b1.Item_id = b2.Item_id 
                        WHERE b1.Email = '".$email."'
                        AND i1.Fromdate > CURRENT_TIMESTAMP
                        ORDER BY i1.Fromdate DESC;";
            return $this->db->query($sql)->result_array();
        }
    }