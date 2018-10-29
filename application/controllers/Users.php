<?php
    class Users extends CI_Controller {

        public function check_login() {
            $user = $this->session->userdata('email');
            if(!isset($user)) { // redirect if there is no log in data
                redirect('auths/logout');
            } else {
                return $user;
            }
        }

        public function index() {
            $current_user = $this->check_login();

            $data['title'] = 'Your Profile: ';
            $data['user'] = $this->user_model->get_user($current_user);
            $data['ongoing_title'] = 'Your On-going Items: ';
            $data['ongoing_items'] = $this->user_model->get_ongoing_items($current_user);
            $data['completed_title'] = 'Your Completed Items: ';
            $data['completed_items'] = $this->user_model->get_completed_items($current_user);
            
            $this->load->view('templates/header');
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer');
        }

        public function edit($user_id){
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
    }