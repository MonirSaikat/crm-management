<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Customer_model extends CI_Model {
  private $table = 'customers';

  public function get($id = null)
  {
    if($id) {
      return $this->db->where('id', $id)->get(
        $this->table
      )->row();
    }
    
    $query = $this->db->get($this->table);
    return $query->result();
  }

  public function insert()
  {
    $data['name'] = $this->input->post('name');
    $data['email'] = $this->input->post('email');
    $data['phone'] = $this->input->post('phone');
    $data['address'] = $this->input->post('address');

    $this->db->insert($this->table, $data);
    return 1;
  }

  public function update()
  {
    $id = $this->input->post('id');
    $data['name'] = $this->input->post('name');
    $data['email'] = $this->input->post('email');
    $data['phone'] = $this->input->post('phone');
    $data['address'] = $this->input->post('address');

    $this->db->where('id', $id);

    $this->db->update($this->table, $data);
    return 1;
  }

  public function toggle_active($id)
  {
    $this->db->where('id', $id);
    $customer = $this->db->get($this->table)->row();
    $this->db->where('id', $id);
    $this->db->update($this->table, ['is_active' => !$customer->is_active]);
    return 1;
  }
}

/* End of file Customer_model.php */
/* Location: ./application/models/Customer_model.php */