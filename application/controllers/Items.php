<?php
    class Items extends CI_Controller {
        public function index() {
            $data['title'] = 'Selected Item: ';

            $this->load->view('templates/header');
            $this->load->view('items/index', $data);
            $this->load->view('templates/footer');
        }
    }