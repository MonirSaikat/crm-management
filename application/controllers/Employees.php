<?php

require BASE_CONTROLLER_PATH;

class Employees extends BaseController
{
  protected $access = 'Admin';

  public function index()
  {
    $employees = $this->employee->get();

    $data['title'] = 'Employees';
    $data['employees'] = $employees;

    $this->load->view('header', $data);
    $this->load->view('employees/list', $data);
    $this->load->view('footer', $data);
  }

  public function create()
  {
    $data['title'] = 'Add Employee';
    $data['designations'] = $this->designation->get();

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('phone', 'Phone number', 'required');
    $this->form_validation->set_rules('salary', 'Salary', 'required');
    $this->form_validation->set_rules('join_date', 'Joining date', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('designation_id', 'Designation', 'required');

    if ($this->form_validation->run() == true) {
      $config['upload_path'] = './asset/img';
      $config['allowed_types'] = 'gif|jpg|png';
      $file_name = time();
      $config['file_name']  = $file_name;
      $config['file_ext_tolower'] = TRUE;

      // create user
      $user_data['name'] = $this->input->post('name');
      $user_data['username'] = $this->input->post('phone');
      $user_data['password'] = sha1('password');
      $user_data['role'] = 2;
      $this->user->insert($user_data);

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image')) {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('error', $error);
      } else {
        $file_name = $this->upload->data()['file_name'];
      }

      if ($this->employee->insert($file_name)) {
        $this->session->set_flashdata('success', 'Employee added successfully');
        redirect('employees');
      }
    }

    $this->load->view('header', $data);
    $this->load->view('employees/create', $data);
    $this->load->view('footer');
  }

  public function destroy($id)
  {
    if ($this->employee->destroy($id)) {
      $this->session->set_flashdata('error', 'Employee deleted');
    }

    redirect('employees');
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Employee';
    $data['employee'] = $this->employee->get($id);
    $data['designations'] = $this->designation->get();

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('phone', 'Phone number', 'required');
    $this->form_validation->set_rules('salary', 'Salary', 'required');
    $this->form_validation->set_rules('join_date', 'Join date', 'required');
    $this->form_validation->set_rules('designation_id', 'Designation', 'required');

    if ($this->form_validation->run() == true) {
      if ($this->employee->update()) {
        $this->session->set_flashdata('success', 'Employee updated successfully');
        redirect('employees');
      }
    }

    $this->load->view('header', $data);
    $this->load->view('employees/edit', $data);
    $this->load->view('footer');
  }

  public function salary($id)
  {
    echo json_encode($this->db->select('salary')->where('id', $id)->from('employees')->get()->row());
    die();
  }

  public function advanced_salary($id, $month)
  {
    $this->db->select_sum('payroll.amount');
    $this->db->where('payroll.is_advanced', 1);
    $this->db->from('payroll');
    $this->db->join('employees', 'employees.id = payroll.employee_id');
    $this->db->where('payroll.employee_id', $id);
    $this->db->where('payroll.month', $month);

    $query = $this->db->get();

    $result = $query->row();

    echo json_encode($result);
    die();
  }

  public function paid_salary($id, $month)
  {
    $this->db->select_sum('payroll.amount');
    $this->db->where('payroll.is_advanced', 0);
    $this->db->from('payroll');
    $this->db->join('employees', 'employees.id = payroll.employee_id');
    $this->db->where('payroll.employee_id', $id);
    $this->db->where('payroll.month', $month);

    $query = $this->db->get();

    $result = $query->row();

    echo json_encode($result);
    die();
  }


  public function toggle_active($id)
  {
    $this->employee->toggle_active($id);
    echo 1;
    die();
  }
}


/* End of file Employees.php */
/* Location: ./application/controllers/Employees.php */