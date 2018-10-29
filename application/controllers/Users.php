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

        public function edit(){
            $current_user = $this->check_login();

            $data['title'] = 'Edit User Profile';

            $data['user'] = $this->user_model->get_user($current_user);

            $this->load->view('templates/header');
            $this->load->view('users/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update_name(){
            $current_user = $this->check_login();

            $this->load->library('form_validation');
            $this->form_validation->set_rules('displayname', 'Display Name', 'trim|required|max_length[20]');

            if($this->form_validation->run() === FALSE) { //didn't validate
                $this->edit();
            } else {
                if($this->user_model->change_name($current_user)) {
                    $this->index();
                } else {
                    $this->edit();
                }
            }
        }

        public function update_password(){
            $current_user = $this->check_login();

            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[32]');
            $this->form_validation->set_rules('confirmpassword', 'Cofirm Password', 'trim|required|matches[password]');

            if($this->form_validation->run() === FALSE) { //didn't validate
                $this->edit();
            } else {
                if($this->user_model->change_password($current_user)) {
                    $this->index();
                } else {
                    $this->edit();
                }
            }
        }
    }