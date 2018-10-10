<?php
    class Item_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function get_items($item_id = FALSE) {
            if($item_id === FALSE) {
                $query = $this->db->query('SELECT * FROM Items;');
                return $query->result_array();
            }

            $query = $this->db->query("SELECT * FROM Items WHERE Item_id = '".$item_id."'");
            return $query->result_array();
        }
        
        public function create_item() {
            $data= array(
                'item_name' => $this->input->post('item_name'),
                'item_id' => 101,
                'owner' => $this->input->post('owner'),
                'description' => $this->input->post('description'),
                'image' => '',//$this->input->post('image'),
                'pickup_location' => $this->input->post('pickup_location'),
                'return_location' => $this->input->post('return_location'),
                'minbid' => $this->input->post('minbid'),
                'fromdate' => $this->input->post('fromdate'),
                'todate' => $this->input->post('todate'),
                'category' => $this->input->post('category')
            );
            $sql = "INSERT INTO Items VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            if($this->db->query($sql, $data)){
                return true;
            }
            return false;
        }
    }