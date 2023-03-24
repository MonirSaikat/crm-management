<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Employee_model extends CI_Model
{
  private $table = 'employees';
  public $name;
  public $email;
  public $phone;
  public $salary;
  public $join_date;
  public $designation_id;
  public $image;

  public function get($id = null)
  {
    $this->db->select('employees.*, designations.name as designation');
    $this->db->from($this->table);
    $this->db->join('designations', 'designations.id = ' . $this->table . '.designation_id');

    if ($id) {
      $this->db->where('employees.id', $id);
      $query = $this->db->get();
      return $query->row();
    }

    $query = $this->db->get();
    return $query->result();
  }

  public function insert($file_name)
  {
    $this->name = $this->input->post('name');
    $this->email = $this->input->post('email');
    $this->phone = $this->input->post('phone');
    $this->salary = $this->input->post('salary');
    $this->join_date = $this->input->post('join_date');
    $this->designation_id = $this->input->post('designation_id');
    $this->image = $file_name;

    $this->db->insert($this->table, $this);
    return 1;
  }

  public function update($id = null)
  {
    $id = $this->input->post('id');
    $this->name = $this->input->post('name');
    $this->email = $this->input->post('email');
    $this->phone = $this->input->post('phone');
    $this->salary = $this->input->post('salary');
    $this->join_date = $this->input->post('join_date');
    $this->designation_id = $this->input->post('designation_id');

    $this->db->where('id', $id);
    $this->db->update($this->table, $this);

    return 1;
  }

  public function destroy($id)
  {
    $this->db->where('id', $id);
    $this->db->delete($this->table);

    return 1;
  }

  public function toggle_active($id)
  {
    $this->db->where('id', $id);
    $employee = $this->db->get($this->table)->row();
    $this->db->where('id', $id);
    $this->db->update($this->table, ['is_active' => !$employee->is_active]);
    return 1;
  }
}
