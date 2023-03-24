<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Service_model
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

class Service_model extends CI_Model
{
  private $table = 'services';
  public $name;
  public $short_desc;
  public $details;
  public $is_active;

  public function get($id = null)
  {
    // $this->db->where('is_active', 1);

    if ($id) {
      $this->db->where('id', $id);
      return $this->db->get($this->table)->row();
    };

    return $this->db->get($this->table)->result();
  }

  public function insert()
  {
    $this->name = $this->input->post('name');
    $this->short_desc = $this->input->post('short_desc');
    $this->details = $this->input->post('details');

    $this->db->insert($this->table, $this);
    return 1;
  }

  public function update($id = null)
  {
    $id = $this->input->post('id');
    $this->name = $this->input->post('name');
    $this->short_desc = $this->input->post('short_desc');
    $this->details = $this->input->post('details');

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
    $service = $this->db->get($this->table)->row();
    $this->db->where('id', $id);
    $this->db->update($this->table, ['is_active' => !$service->is_active]);
    return 1;
  }

  private function _set_data($data)
  {
    $this->name = $data->name;
    $this->short_desc = $data->short_desc;
    $this->details = $data->details;
  }
}

/* End of file Service_model.php */
/* Location: ./application/models/Service_model.php */