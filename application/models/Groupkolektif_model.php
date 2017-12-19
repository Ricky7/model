<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groupkolektif_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // add group
  public function addGroup($data)
  {
      $this->db->insert('inm_kolektif', $data);
      return true;
  }

  // edit group
  public function editGroup($id, $data)
  {
      $this->db->where('id', $id);
      $this->db->update('inm_kolektif', $data);
      return true;
  }

  // show group by id
  public function getGroupById($id)
  {
      return $this->db->get_where('inm_kolektif', array('id' => $id));
  }

  // show all group
  public function getAllGroup()
  {
      return $this->db->get('inm_kolektif');
  }

  // delete group
  public function deleteGroup($id)
  {
      $this->db->where('id', $id);
      $this->db->delete('inm_kolektif');
      return true;
  }

}
