<?php
    class Items extends CI_Controller {
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

        public function create() {
            $data['title'] = 'Lease a new item';

            $this->form_validation->set_rules('owner', 'Owner', 'required');
            $this->form_validation->set_rules('item_name', 'Item_name', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('minbid', 'Minbid', 'required');
            $this->form_validation->set_rules('pickup_location', 'Pickup_location', 'required');
            $this->form_validation->set_rules('return_location', 'Return_location', 'required');
            $this->form_validation->set_rules('fromdate', 'Fromdate', 'required');
            $this->form_validation->set_rules('todate', 'Todate', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');

            if($this->form_validation->run() === FALSE) {
                print_r(1);
                $this->load->view('templates/header');
                $this->load->view('items/create', $data);
                $this->load->view('templates/footer');
            } else {
                print_r($this->input);
                $this->item_model->create_item();
                redirect('items');
            }
        }
    }