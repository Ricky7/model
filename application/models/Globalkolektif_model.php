<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Globalkolektif_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // add new kolektif
  public function addKolektif($no_hp, $no_pelanggan)
  {
      $this->db->set('no_hp', $no_hp);
      $this->db->insert('inm_global_kolektif');
      $lastId = $this->db->insert_id();
      foreach($no_pelanggan as $val)
      {
          $this->db->set('id_global_kolektif', $lastId);
          $this->db->set('no_pelanggan', $val);
          $this->db->insert('inm_global_kolektif_detail');
      }
      return true;
  }

  // show kolektif by phone number
  public function getKolektif($no_hp)
  {
      $this->db->select('*');
      $this->db->from('inm_global_kolektif a');
      $this->db->join('inm_global_kolektif_detail b', 'a.id = b.id_global_kolektif');
      $this->db->where('a.no_hp',$no_hp);
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

  // show all kolektif
  public function getAllKolektif()
  {
      $this->db->select('*');
      $this->db->from('inm_global_kolektif a');
      $this->db->join('inm_global_kolektif_detail b', 'a.id = b.id_global_kolektif');
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

}
