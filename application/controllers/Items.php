<?php
    class Items extends CI_Controller {
        public function index() {
            $data['title'] = 'Selected Item: ';

            $data['items'] = $this->item_model->get_items();

            $this->load->view('templates/header');
            $this->load->view('items/index', $data);
            $this->load->view('templates/footer');
        }
    }