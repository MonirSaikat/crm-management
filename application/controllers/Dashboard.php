<?php

require BASE_CONTROLLER_PATH;

class Dashboard extends BaseController
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('auth');
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['total_employees'] = count($this->employee->get());
    $data['total_customers'] = count($this->customer->get());
    $data['total_users'] = count($this->user->get());

    $this->load->view('header', ['title' => 'Dashboard']);
    $this->load->view('dashboard/index', $data);
    $this->load->view('footer');
  }
}
