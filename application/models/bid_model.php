<?php
    class Bid_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        //for owner of the item, to see who have bid for the item
        public function get_bids($item_id) {
            $query = $this->db->query("SELECT Rate, Email FROM Bids WHERE Item_id = ".$item_id." 
                                        ORDER BY Rate DESC;");
            return $query->result_array();
        }

        public function create_bid($item_id,$email) {
            $data= array(
                'item_id' => $item_id,
                'email' => $email,
                'rate' => $this->input->post('rate')
            );
            //$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try {
                $sql = "INSERT INTO Bids VALUES(?,?,?);";
                $result = $this->db->query($sql, $data);
            } catch (PDOException $err) {
                //print $this->db->_error_message();
                $ei = $err->errorInfo;
                die("Function call failed with SQLSTATE " . $ei[0] . ", message " . $ei[2] . "\n");
            } 
            return $result;
        }

        public function get_current_bid($item_id,$email) {
            $result = $this->db->query("SELECT * FROM bids WHERE Item_id = ".$item_id." AND Email = '".$email."';");
            return $result->result_array();
        }

        public function get_current_highest($item_id) {
            $result = $this->db->query("SELECT MAX(Rate) FROM bids WHERE Item_id = ".$item_id.";");
            return $result->result_array();
        }

        public function update_bid($item_id, $email) {
            $rate = $this->input->post('rate');
            return $this->db->query("UPDATE Bids SET Rate='".$rate."' WHERE Item_id = ".$item_id." AND Email = '".$email."';");
        }

        public function check_if_higher_than_current_highest($rate) {
            $item_id = $this->input->post('item_id');
            $result = $this->db->query("SELECT MAX(Rate) FROM Bids WHERE Item_id = ".$item_id.";")->result_array();
            if(empty($result)) {
                return TRUE;
            } else {
                $value = reset($result)['max'];
                return $rate > $value;
            }
        }
   }