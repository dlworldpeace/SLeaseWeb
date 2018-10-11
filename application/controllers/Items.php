<?php
    class Items extends CI_Controller {

        public function check_login() {
            $user = $this->session->userdata('email');
            if(!isset($user)) { // redirect if there is no log in data
                redirect('auths/logout');
            } else {
                return $user;
            }
        }


        /* Items functions. */
        public function index() {
            $current_user = $this->check_login();

            $data['title'] = 'Items on lease: ';

            $data['items'] = $this->item_model->get_items();
            
            $this->load->view('templates/header');
            $this->load->view('items/index', $data);
            $this->load->view('templates/footer');
        }

        public function detail($item_id) {
            $current_user = $this->check_login();

            $data['items'] = $this->item_model->get_items($item_id);

            if(empty($data['items'])) {
                show_404();
            }
            $data['item'] = reset($data['items']);
            $category = $this->category_model->get_category($data['item']['categories']);
            $data['category'] = reset($category)['name'];

            // pass the current bid data by current user for this item to view
            $bid_data['bid'] = $this->get_current_bid($item_id, $current_user);

            $this->load->view('templates/header');
            $this->load->view('items/detail', $data);
            if($current_user !== $data['item']['owner']) { // load bidding board if this item belongs to someone else.
                $this->load->view('bids/view', $bid_data);
            } else { // load current bidding stats if this item belongs to current user.
                // TODO: load bidding stats view
            }
            $this->load->view('templates/footer');
        }

        public function create($msg = FALSE) {
            $current_user = $this->check_login();

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
            $current_user = $this->check_login();

            $keyword = $this->input->post('searchBy');	
            $data['items'] = $this->item_model->search_items($keyword);	
            $data['title'] = 'Items with the keyword: '.$keyword;	
            $this->load->view('templates/header');	
            $this->load->view('items/index', $data);
            $this->load->view('templates/footer');	
        }	

        public function delete($item_id){
            $current_user = $this->check_login();
            	
            if($this->item_model->delete_item($item_id)) {
                redirect('items');
            }
        }

        public function edit($item_id){
            $current_user = $this->check_login();

            $data['title'] = 'Edit your item';

            $data['items'] = $this->item_model->get_items($item_id);

            if(empty($data['items'])) {
                show_404();
            }

            $data['item'] = reset($data['items']);
            $data['categories'] = $this -> category_model -> get_categories();

            $this->load->view('templates/header');
            $this->load->view('items/edit', $data);
            $this->load->view('templates/footer');

        }

        public function update($item_id){
            $current_user = $this->check_login();

            print_r('starting to validate');
            $this->form_validation->set_rules('item_name', 'Item_name', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('pickup_location', 'Pickup_location', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');


            if($this->form_validation->run() === FALSE) {
                print_r("fail to pass validation");
            } else {
                if($this->item_model->update_item($item_id)) {
                    $this->detail($item_id);
                } else {
                    print_r("update unsuccessfully.");
                }
            }   
        }

        /* Items functions end. */


        /* Bids functions. */
        public function get_current_bid($item_id, $current_user) {
            $result = $this->bid_model->get_current_bid($item_id, $current_user);
            return reset($result);
        }

        public function create_bid($item_id) {
            $current_user = $this->check_login();

            $rate = $this->input->post('rate');	
            if($this->item_model->create_bid($item_id, $current_user)) {
                print_r('placed bid successfully!');
                redirect('items/detail/'.$item_id);
            } else {
                print_r('Fail to place bid');
            }
        }
     
        /* Bids functions end. */
    }