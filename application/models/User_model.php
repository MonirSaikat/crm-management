<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

  private $table = 'users';
  private $_data = array();

  public function get($id = null)
  {
    return $this->db->get($this->table)->result();
  }
  
  public function insert($user_data)
  {
    $this->db->insert($this->table, $user_data);
    return 1;
  }
  
  public function validate()
  {
    $user_name = $this->input->post('user_name');
    $password = $this->input->post('password');

    $this->db->where('username', $user_name);
    $query = $this->db->get($this->table);
    $row = $query->row();

    if (!$row) {
      return ERROR_USER_NOT_FOUND;
    }

    if (sha1($password) != $row->password) {
      return ERROR_INVALID_PASSWORD;
    }

    unset($row->password);
    $this->_data = (array) $row;
    
    return 1;
  }

  public function update_password()
  {
    $old_password = $this->input->post('old_password');
    $password = $this->input->post('password');
    $confirm_password = $this->input->post('confirm_password');

    $this->db->where('username', $this->session->userdata('username'));
    $user = $this->db->get($this->table)->row();

    if($user->password !== sha1($old_password)) return ERROR_OLD_PASSWORD;
    if($password !== $confirm_password) return ERROR_CONFIRM_PASSWORD;

    $this->db->where('username', $this->session->userdata('username'));
    $this->db->update($this->table, ['password' => sha1($password)]);
    return 1;
  }

  public function get_data()
  {
    return $this->_data;
  }
}
