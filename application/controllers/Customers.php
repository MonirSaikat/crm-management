<?php

require BASE_CONTROLLER_PATH;


class Customers extends BaseController
{

  public function index()
  {
    $data['customers'] = $this->customer->get();

    $this->load->view('header', $data);
    $this->load->view('customers/index', $data);
    $this->load->view('footer');
  }

  public function create()
  {
    $data = array();

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('phone', 'Phone', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');

    if ($this->form_validation->run() == true) {
      if ($this->customer->insert()) {
        $this->session->set_flashdata('success', 'Customer created');
      } else {
        $this->session->set_flashdata('error', ' Something went wrong');
      }

      redirect('customers');
    }

    $this->load->view('header', ['title' => 'Customers']);
    $this->load->view('customers/create', $data);
    $this->load->view('footer');
  }

  public function edit($id)
  {
    $data['customer'] = $this->customer->get($id);

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('phone', 'Phone', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');

    if ($this->form_validation->run() == true) {
      if ($this->customer->update()) {
        $this->session->set_flashdata('success', 'Customer updated');
      } else {
        $this->session->set_flashdata('error', ' Something went wrong');
      }

      redirect('customers');
    }

    $this->load->view('header', $data);
    $this->load->view('customers/edit', $data);
    $this->load->view('footer');
  }


  public function toggle_active($id)
  {
    $this->customer->toggle_active($id);
    echo 1;
    die();
  }
}


/* End of file Customers.php */
/* Location: ./application/controllers/Customers.php */