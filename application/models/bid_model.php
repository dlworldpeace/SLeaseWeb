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
        public function get_suBids($Email) {
                $query = $this->db->query("");//need to be modify
                return $query->result_array();
        }

        //my bid item that is unsuccessful , need to finalize with the sql
        public function get_unsuBbids($Email) {
            $query = $this->db->query("");//need to be modify
            return $query->result_array();
        }

        //create bid, follow item_create
        public function create_bids() {
            
        }

        //if the user have bid the item
        public function get_current_bid($item_id,$Email) {
            $result = $this->db->query("SELECT * FROM bids WHERE Item_id = ".$item_id." AND Email = '".$Email."';");
            print_r($result->num_rows());
            return $result->num_rows() === 1;
        }

        public function delete_bid($item_id, $Email) {
            $this->db->query("DELETE FROM Bids WHERE Item_id = ".$item_id." AND Email = '".$Email."';");
            return true;
        }

        public function update_bid($Rate,$item_id, $Email) {
            $this->db->query("UPDATE Bids SET Rate='".$Rate."'  Item_id = ".$item_id." AND Email = '".$Email."';");
            return true;
        }
   }