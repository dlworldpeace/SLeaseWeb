<?php
    class Items extends CI_Controller {

        public function check_login() {
            $user = $this->session->userdata('email');
            if(!isset($user)) { // redirect if there is no log in data
                redirect('auths/logout');
            }
        }

        public function index() {
            $this->check_login();

            $data['title'] = 'Items on lease: ';

            $data['items'] = $this->item_model->get_items();
            
            $this->load->view('templates/header');
            $this->load->view('items/index', $data);
            $this->load->view('templates/footer');
        }

        public function detail($item_id) {
            $this->check_login();

            $data['items'] = $this->item_model->get_items($item_id);

            if(empty($data['items'])) {
                show_404();
            }
            $data['item'] = reset($data['items']);
            $category = $this->category_model->get_category($data['item']['categories']);
            $data['category'] = reset($category)['name'];

            print_r($data['category']);

            $this->load->view('templates/header');
            $this->load->view('items/detail', $data);
            $this->load->view('templates/footer');
        }

        public function create($msg = FALSE) {
            $this->check_login();

            $data['title'] = 'Lease a new item';
            if($msg !== FALSE) {	
                $data['error'] = $msg['error'];	
            }

            $this->form_validation->set_rules('owner', 'Owner', 'required');
            $this->form_validation->set_rules('item_name', 'Item_name', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('minbid', 'Minbid', 'required');
            //$this->form_validation->set_rules('user_file', 'Image', 'required');
            $this->form_validation->set_rules('pickup_location', 'Pickup_location', 'required');
            $this->form_validation->set_rules('return_location', 'Return_location', 'required');
            $this->form_validation->set_rules('fromdate', 'Fromdate', 'required');
            $this->form_validation->set_rules('todate', 'Todate', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');

            $data['categories'] = $this -> category_model -> get_categories();

            if($this->form_validation->run() === FALSE) {
                print_r(1);
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

        public function search() {	
            $this->check_login();

            $keyword = $this->input->post('searchBy');	
            $data['items'] = $this->item_model->search_items($keyword);	
            $data['title'] = 'Items with the keyword: '.$keyword;	
             $this->load->view('templates/header');	
            $this->load->view('items/index', $data);	
            $this->load->view('templates/footer');	
        }	

        public function delete($item_id){
            $this->check_login();
            	
            if($this->item_model->delete_item($item_id)) {
                redirect('items');
            }
        }
    }