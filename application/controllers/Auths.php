<?php
    class Auths extends CI_Controller {

        public function index() {            
            $this->load->view('auths/login');
        }

        public function signup() {            
            $this->load->view('auths/signup');
        }

        public function validate() {
            if($this->auth_model->validate()) { // if the user's credential is validated.
                $data = array(
                    'email' => $this->input->post('email'),
                    //'is_logged_in' => true
                );
                $this->session->set_userdata($data);
                redirect('items');
            } else { // incorrect user email or password
                print_r("Incorrect user email or password!");
                $this->index();
            }
        }

        public function create_user() {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'User Email', 'trim|required|valid_email|callback_check_if_email_exists');
            $this->form_validation->set_rules('displayname', 'Display Name', 'trim|required|max_length[20]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[32]');
            $this->form_validation->set_rules('confirmpassword', 'Cofirm Password', 'trim|required|matches[password]');

            if($this->form_validation->run() === FALSE) { //didn't validate
                $this->load->view('auths/signup');
            } else {
                if($this->auth_model->create_user()) {
                    $data['account_created'] = 'Your account has been created.<br/><br/>You may login with your new account.';
                    $this->load->view('auths/login', $data);
                } else {
                    $this->load->view('auths/signup');
                }
            }
        }

        public function check_if_email_exists($proposed_email) { // custom callback function
            return $this->auth_model->check_if_email_exists($proposed_email);
        }

        public function logout() {
            $this->session->sess_destroy();
            $this->index();
        }

        public function check_login() {
            $user = $this->session->userdata('email');
            if(!isset($user)) { // redirect if there is no log in data
                $this->logout();
            }
        }
    }