<?php

require BASE_CONTROLLER_PATH;

class Settings extends BaseController
{
  public function index()
  {
    $data = array();

    $this->load->view('header', ['title' => 'Settings']);
    $this->load->view('settings/index', $data);
    $this->load->view('footer');
  }

  public function update_password()
  {
    $this->form_validation->set_rules('old_password', 'previous password', 'required');
    $this->form_validation->set_rules('password', 'new password', 'required');
    $this->form_validation->set_rules('confirm_password', 'confirm password', 'required');

    $data = array();

    if ($this->form_validation->run() == true) {
      $status = $this->user->update_password();

      if ($status === ERROR_OLD_PASSWORD) {
        $this->session->set_flashdata('error', ERROR_OLD_PASSWORD);
      } else if ($status === ERROR_CONFIRM_PASSWORD) {
        $this->session->set_flashdata('error', ERROR_CONFIRM_PASSWORD);
      } else {
        $this->session->set_flashdata('success', 'Password updated successfully');
      }

      redirect(site_url('settings'));
    }

    $this->load->view('header', ['title' => 'Settings']);
    $this->load->view('settings/index', $data);
    $this->load->view('footer');
  }
}
