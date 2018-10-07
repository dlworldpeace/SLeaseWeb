<?php
    class Pages extends CI_Controller {
        public function view($page = 'home') { // default is directed to home
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404(); // load 'not found'
            }

            $data['title'] = ucfirst($page); // Upper case first letter of file name

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
        }
    }