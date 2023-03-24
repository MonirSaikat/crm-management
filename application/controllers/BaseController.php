<?php

class BaseController extends CI_Controller
{
    protected $access = '*';

    public function __construct()
    {
        parent::__construct();
        $this->check_auth();
    }

    public function check_auth()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        
        if (!$this->has_permission()) {
            show_error('Access denied', 403);
        }

    }

    public function has_permission()
    {
        $role = strtolower($this->session->userdata['role'] == 1 ? 'Admin' : 'Employee');

        $access = is_array($this->access)
            ? $this->access
            : explode(',', $this->access);

        $access = array_map('strtolower', $access);
        
        if($this->access === '*') return true;
        if (in_array($role, $access)) return true;
        return false;
    }
}
