<?php

require BASE_CONTROLLER_PATH;

class Payroll extends BaseController
{
  protected $access = 'admin';

  public function index()
  {
    $data['title'] = 'Payroll';
    $data['payroll'] = $this->payroll->get();

    $this->load->view('header');
    $this->load->view('payroll/list', $data);
    $this->load->view('footer');
  }

  public function create()
  {
    $data['title'] = 'Add Payroll';
    $data['employees'] = $this->employee->get();
    $data['months'] = $this->db->get('months')->result();

    $this->form_validation->set_rules('employee_id', 'Employee', 'required');
    $this->form_validation->set_rules('month', 'Month', 'required');
    $this->form_validation->set_rules('pay_amount', 'Amount', 'required');

    if ($this->form_validation->run() == true) {
      if ($this->payroll->insert()) {
        $this->session->set_flashdata('success', 'Payroll added');
        redirect(base_url() . 'payroll');
      }
    }

    $this->load->view('header');
    $this->load->view('payroll/create', $data);
    $this->load->view('footer');
  }

  public function destroy($id)
  {
    if ($this->payroll->destroy($id)) {
      $this->session->set_flashdata('success', 'Payroll deleted');
    }

    redirect(site_url('payroll'), 'refresh');
  }
}
