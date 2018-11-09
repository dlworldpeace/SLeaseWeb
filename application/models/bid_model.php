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
            $sql = "INSERT INTO Bids VALUES(?,?,?);";
            $this->db->query($sql, $data);
            return $this->db->affected_rows();
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
            $this->db->query("UPDATE Bids SET Rate='".$rate."' WHERE Item_id = ".$item_id." AND Email = '".$email."';");
            return $this->db->affected_rows();
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