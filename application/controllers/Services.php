<?php

require BASE_CONTROLLER_PATH;

class Services extends BaseController
{
  protected $access = 'admin';

  public function index()
  {
    $data['services'] = $this->service->get();

    $this->load->view('header', ['title', 'Services']);
    $this->load->view('services/index', $data);
    $this->load->view('footer');
  }

  public function create()
  {
    $data = array();

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('short_desc', 'short_desc', 'required');

    if ($this->form_validation->run() == true) {
      if ($this->service->insert()) {
        $this->session->set_flashdata('success', 'Service created');
      } else {
        $this->session->set_flashdata('error', ' Something went wrong');
      }

      redirect('services');
    }

    $this->load->view('header', ['title', 'Services']);
    $this->load->view('services/create', $data);
    $this->load->view('footer');
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Service';
    $data['service'] = $this->service->get($id);

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('short_desc', 'short_desc', 'required');

    if ($this->form_validation->run() == true) {
      if ($this->service->update()) {
        $this->session->set_flashdata('success', 'Service updated');
        redirect('services');
      }
    }

    $this->load->view('header', $data);
    $this->load->view('services/edit', $data);
    $this->load->view('footer');
  }

  public function destroy($id)
  {
    if ($this->service->destroy($id)) {
      $this->session->set_flashdata('success', 'Service deleted');
    } else {
      $this->session->set_flashdata('error', 'Something went wrong');
    }

    redirect(site_url('services'));
  }

  public function toggle_active($id)
  {
    $this->service->toggle_active($id);
    echo 1;
    die();
  }
}
