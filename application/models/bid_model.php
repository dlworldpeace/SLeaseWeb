<?php
    class Bid_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        //for owner of the item, to see who have bid for the item
        public function get_bids($item_id) {
                $query = $this->db->query("SELECT Rate, Email FROM Bids  WHERE item_id = ".$item_id.";");
                return $query->result_array();
        }

        //my bid item that is successful , need to finalize with the sql
        public function get_suBids($email) {
                $query = $this->db->query("");//need to be modify
                return $query->result_array();
        }

        //my bid item that is unsuccessful , need to finalize with the sql
        public function get_unsuBbids($email) {
            $query = $this->db->query("");//need to be modify
            return $query->result_array();
        }

        //create bid, follow item_create
        public function create_bid($item_id,$email) {
            $data= array(
                'item_id' => $item_id,
                'email' => $email,
                'rate' => $this->input->post('rate')
            );
            $sql = "INSERT INTO Bids VALUES(?,?,?);";
            return $this->db->query($sql, $data);
        }

        //if the user have bid the item
        public function get_current_bid($item_id,$email) {
            $result = $this->db->query("SELECT * FROM bids WHERE Item_id = ".$item_id." AND Email = '".$email."';");
            return $result->result_array();
        }

        public function delete_bid($item_id, $email) {
            return $this->db->query("DELETE FROM Bids WHERE Item_id = ".$item_id." AND Email = '".$email."';");

        }

        public function update_bid($item_id, $email) {
            $rate = $this->input->post('rate');
            return $this->db->query("UPDATE Bids SET Rate='".$rate."' WHERE Item_id = ".$item_id." AND Email = '".$email."';");
        }
   }