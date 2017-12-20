<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groupkolektif_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // add group
  //array 1 untuk id_user & nama_kolektif
  //array 2 untuk no pelanggan
  public function addKolektif($data_kolektif, $no_pelanggan)
  {
      $this->db->insert('inm_kolektif', $data_kolektif);
      $lastId = $this->db->insert_id();
      foreach($no_pelanggan as $val)
      {
          $this->db->set('id_kolektif', $lastId);
          $this->db->set('no_pelanggan', $val);
          $this->db->insert('inm_kolektif_detail');
      }
      return true;
  }

  // edit group
  public function editNamaKolektif($id, $nama_kolektif)
  {
      $this->db->set('nama_kolektif', $nama_kolektif);
      $this->db->where('id', $id);
      $this->db->update('inm_kolektif');
      return true;
  }

  // edit no pelanggan
  public function editNoPelanggan($id, $no_pelanggan)
  {
      $this->db->set('no_pelanggan', $no_pelanggan);
      $this->db->where('id', $id);
      $this->db->update('inm_kolektif_detail');
  }

  // show group kolektif by id
  public function getKolektifById($id)
  {
      $this->db->select('*');
      $this->db->from('inm_kolektif a');
      $this->db->join('inm_kolektif_detail b', 'a.id = b.id_kolektif');
      $this->db->where('a.id',$id);
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

  // show all group kolektif
  public function getAllKolektif()
  {
      $this->db->select('*');
      $this->db->from('inm_kolektif a');
      $this->db->join('inm_kolektif_detail b', 'a.id = b.id_kolektif');
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
