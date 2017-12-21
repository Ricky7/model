<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // insert Pinjaman
  // isi array @data (user_id, limit_pinjaman, admin_id, tgl_create)
  public function addPinjaman($data)
  {
      $this->db->insert('inm_pinjaman', $data);
      return true;
  }

  // show pinjaman by date
  public function getPinjamanByDate($date)
  {
      return $this->db->get_where('inm_pinjaman', array('tgl_create' => $date));
  }

  // show pinjaman by start date - end date
  public function getPinjamanByIntervalDate($start_date, $end_date)
  {
      $this->db->select('*');
      $this->db->from('inm_pinjaman');
      $this->db->where('tgl_create >=', $start_date);
      $this->db->where('tgl_create <=', $end_date);
      $query = $this->db->get();
      if($query->num_rows() != 0)
      {
          return $query->result_array();
      }
      else
      {
          return false;
      }
  }

  // show pinjaman by user
  public function getPinjamanByUser($user_id')
  {
      return $this->db->get_where('inm_pinjaman', array('user_id' => $user_id));
  }

}
