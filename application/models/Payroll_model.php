<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Payroll_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Payroll_model extends CI_Model
{
  private $table = 'payroll';

  public function get($id = null)
  {
    $this->db->select('payroll.*, employees.name as employee');
    $this->db->from('payroll');
    $this->db->join('employees', 'employees.id = payroll.employee_id');
    return $this->db->get()->result();
  }

  public function insert()
  {
    $data['employee_id'] = $this->input->post('employee_id');
    $data['month'] = $this->input->post('month');
    $data['amount'] = $this->input->post('pay_amount');
    $data['is_advanced'] = $this->input->post('is_advanced') ?? 0;

    $this->db->insert($this->table, $data);
    return 1;
  }

  public function destroy($id)
  {
    $this->db->where('id', $id);
    $this->db->delete($this->table);
    return 1;
  }
}

/* End of file Payroll_model.php */
/* Location: ./application/models/Payroll_model.php */