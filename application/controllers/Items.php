<?php
    class Items extends CI_Controller {

        // function __construct() {
        //     parent::__construct();
        //     $this->load->helper('form');
        // }

        public function index() {
            $data['title'] = 'Items on lease: ';
            

            $data['items'] = $this->item_model->get_items();
            
            $this->load->view('templates/header');
            $this->load->view('items/index', $data);
            $this->load->view('templates/footer');
        }

        public function detail($item_id) {
            $data['items'] = $this->item_model->get_items($item_id);

            if(empty($data['items'])) {
                show_404();
            }
            $data['item'] = reset($data['items']);

            $this->load->view('templates/header');
            $this->load->view('items/detail', $data);
            $this->load->view('templates/footer');
        }

        public function create($msg = FALSE) {
            $data['title'] = 'Lease a new item'; 
            if($msg !== FALSE) {
                $data['error'] = $msg['error'];
            }

            $this->form_validation->set_rules('item_name', 'Item_name', 'required');
            $this->form_validation->set_rules('owner', 'Owner', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            //$this->form_validation->set_rules('user_file', 'Image', 'required');
            $this->form_validation->set_rules('pickup_region', 'Pickup_region', 'required');
            $this->form_validation->set_rules('pickup_location', 'Pickup_location', 'required');
            $this->form_validation->set_rules('return_location', 'Return_location', 'required');
            $this->form_validation->set_rules('minbid', 'Minbid', 'required');
            $this->form_validation->set_rules('fromdate', 'Fromdate', 'required');
            $this->form_validation->set_rules('todate', 'Todate', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');

            if($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('items/create', $data);
                $this->load->view('templates/footer');
            } else { 
                // $config['upload_path']          = './uploads/';
                // $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 100;
                // $config['max_width']            = 150;
                // $config['max_height']           = 150;

                // $this->load->library('upload', $config);

                // if($this->upload->do_upload() && $this->item_model->create_item()) {
                //     redirect('items');
                // } else {
                //     $msg = array('error' => $this->upload->display_errors());
                //     print_r($msg);
                //     //redirect('items/create', $msg);
                // }
                if($this->item_model->create_item()) {
                    redirect('items');
                }
            }
        }

        public function search(){

        }

        public function delete($item_id){
            if($this->item_model->delete_item($item_id)) {
                redirect('items');
            }
        }
    }