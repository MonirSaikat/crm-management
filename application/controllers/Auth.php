<?php

require BASE_CONTROLLER_PATH;

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {

        if ($this->session->userdata('logged_in')) {
            redirect('/');
        }

        $this->form_validation->set_rules('user_name', 'Usernmae', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            $status = $this->user->validate();

            if ($status == ERROR_USER_NOT_FOUND) {
                $this->session->set_flashdata('error', 'User not found');
            } else if ($status == ERROR_INVALID_PASSWORD) {
                $this->session->set_flashdata('error', 'Password is wrong');
            } else {
                $this->session->set_flashdata('error', '');
                $this->session->set_userdata($this->user->get_data());
                $this->session->set_userdata('logged_in', true);

                redirect('/', 'refresh');
            }
        };

        $this->load->view('auth/login');
    }

    public function logout()
    {
        $this->session->set_userdata('logged_in', false);
        $this->session->sess_destroy();

        redirect('auth/login', 'refresh');
    }
}
