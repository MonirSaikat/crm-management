<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Designation_model
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

class Designation_model extends CI_Model
{
  private $table = 'designations';

  public function get($id = null)
  {
    $query = $this->db->get($this->table);
    return $query->result();
  }
}

/* End of file Designation_model.php */
/* Location: ./application/models/Designation_model.php */