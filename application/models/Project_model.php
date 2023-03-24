<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Project_model
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

class Project_model extends CI_Model
{

  private $table = 'projects';

  public function get($id = null)
  {
    $this->db->select('customers.name as customer, projects.*');
    $this->db->join('customers', 'customers.id=projects.customer_id');
    
    if ($id) {
      return $this->db->get(
        $this->table
      )->row();
    }

    return $this->db->get(
      $this->table
    )->result();
  }


  public function insert()
  {
    $data['title'] = $this->input->post('title');
    $data['details'] = $this->input->post('details');
    $data['customer_id'] = $this->input->post('customer_id');
    $data['technologies'] = is_array($this->input->post('technologies')) 
                            ? implode(',', $this->input->post('technologies'))
                            : $this->input->post('technologies');
                            
    $data['price'] = $this->input->post('price');
    $data['start_date'] = $this->input->post('start_date');
    $data['deadline_date'] = $this->input->post('deadline_date');

    $this->db->insert($this->table, $data);
    return 1;
  }


  public function update()
  {
    $id = $this->input->post('id');
    $data['title'] = $this->input->post('title');
    $data['details'] = $this->input->post('details');
    $data['customer_id'] = $this->input->post('customer_id');
    $data['technologies'] = $this->input->post('technologies');
    $data['price'] = $this->input->post('price');
    $data['start_date'] = $this->input->post('start_date');
    $data['deadline_date'] = $this->input->post('deadline_date');

    $this->db->where('id', $id);
    $this->db->update($this->table, $data);
    return 1;
  }


  public function destroy($id)
  {
    $this->db->where('id', $id);
    $this->db->delete(
      $this->table
    );

    return 1;
  }
}
