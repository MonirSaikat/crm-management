<?php

require BASE_CONTROLLER_PATH;


class Projects extends BaseController
{

  public function index()
  {
    $data['projects'] = $this->project->get();

    $this->load->view('header', $data);
    $this->load->view('projects/index', $data);
    $this->load->view('footer');
  }

  public function create()
  {
    $data['customers'] = $this->customer->get();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('customer_id', 'Customer', 'required');
    $this->form_validation->set_rules('price', 'Price', 'required');
    // $this->form_validation->set_rules('technologies', 'Technologies', 'required');
    $this->form_validation->set_rules('details', 'Details', 'required');
    $this->form_validation->set_rules('start_date', 'Start Date', 'required');
    $this->form_validation->set_rules('deadline_date', 'Deadline Date', 'required');


    if ($this->form_validation->run() == true) {
      if ($this->project->insert()) {
        // add customer due
        $customer = $this->customer->get($this->input->post('customer_id'));
        $this->db->where('id', $customer->id);
        $this->db->update('customers', ['due' => $customer->due + intval(
          $this->input->post('price')
        )]);

        $this->session->set_flashdata('success', 'Project created');
      } else {
        $this->session->set_flashdata('error', ' Something went wrong');
      }

      redirect('projects');
    }

    $this->load->view('header', ['title' => 'projects']);
    $this->load->view('projects/create', $data);
    $this->load->view('footer');
  }

  public function edit($id)
  {
    $data['project'] = $this->project->get($id);
    $data['customers'] = $this->customer->get();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('customer_id', 'Customer', 'required');
    $this->form_validation->set_rules('price', 'Price', 'required');
    $this->form_validation->set_rules('technologies', 'Technologies', 'required');
    $this->form_validation->set_rules('details', 'details', 'required');
    $this->form_validation->set_rules('start_date', 'Start', 'required');
    $this->form_validation->set_rules('deadline_date', 'deadline', 'required');

    if ($this->form_validation->run() == true) {
      if ($this->project->update()) {
        $this->session->set_flashdata('success', 'project updated');
      } else {
        $this->session->set_flashdata('error', ' Something went wrong');
      }

      redirect('projects');
    }

    $this->load->view('header', $data);
    $this->load->view('projects/edit', $data);
    $this->load->view('footer');
  }

  /**
   * Delete Project 
   * by id 
   */
  public function destroy($id)
  {
    if ($this->project->destroy($id)) {
      $this->session->set_flashdata('success', 'Project deleted');
    }

    redirect(site_url('projects'));
  }

  /**
   * Toggle active of project
   */
  public function toggle_active($id)
  {
    $this->project->toggle_active($id);
    echo 1;
    die();
  }

  /**
   * Assign project to employee 
   * with multiple roles like dev, team lead etc
   */
  public function assign_employee()
  {
    $data['projects'] = $this->project->get();
    $data['employees'] = $this->employee->get();

    // show data with employee and project
    $this->db->select('p.title AS project, GROUP_CONCAT(CONCAT(e.name, ": ", r.name) SEPARATOR ", ") AS employee_roles');
    $this->db->from('projects p');
    $this->db->join('projects_employee pe', 'p.id = pe.project_id');
    $this->db->join('employees e', 'pe.employee_id = e.id');
    $this->db->join('project_roles r', 'pe.role_id = r.id');
    $this->db->group_by('p.id');
    $query = $this->db->get();

    $data['items'] = $query->result();

    $this->form_validation->set_rules('employee_id', 'Employee', 'required|is_natural_no_zero');
    $this->form_validation->set_rules('project_id', 'Project', 'required|is_natural_no_zero');

    if ($this->form_validation->run() == true) {
      $roles = $this->input->post('role');
      $assigned_success = true;

      foreach ($roles as $role) {
        if (
          $this->db->where(
            'employee_id',
            $this->input->post('employee_id')
          )->where('role_id', $role)->get('projects_employee')->row()
        ) {
          $this->session->set_flashdata('error', 'Project already assigned to this employee');
          $assigned_success = false;
          break;
        }

        $ins_data['role_id'] = $role;
        $ins_data['project_id'] = $this->input->post('project_id');
        $ins_data['employee_id'] = $this->input->post('employee_id');
        $this->db->insert('projects_employee', $ins_data);
      }

      if ($assigned_success) {
        $this->session->set_flashdata('success', 'Project assigned');
      }

      redirect(site_url('projects/assign_employee'));
    }

    $this->load->view('header', $data);
    $this->load->view('projects/assign_employee', $data);
    $this->load->view('footer');
  }
}


/* End of file projects.php */
/* Location: ./application/controllers/projects.php */