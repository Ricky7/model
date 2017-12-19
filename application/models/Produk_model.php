<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // add produk
  public function addProduk($data)
  {
      $this->db->insert('inm_produk', $data);
      return true;
  }

  // edit produk
  public function editProduk($id, $data)
  {
      $this->db->where('id', $id);
      $this->db->update('inm_produk', $data);
      return true;
  }

  // get produk by id
  public function getProdukById($id)
  {
      return $this->db->get_where('inm_produk', array('id' => $id));
  }

  // get all produk
  public function getAllProduk()
  {
      return $this->db->get('inm_produk');
  }

  // delete produk
  public function deleteProduk($id)
  {
      $this->db->where('id', $id);
      $this->db->delete('inm_produk');
      return true;
  }
}
