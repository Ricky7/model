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

  public function getProdukWhereJenisAndVendor($jenis_produk_id,$kode_produk,$kode_vendor,$kode_produk_vendor)
  {
        $this->db->select('*');
        $this->db->from('inm_produk');

        if(!is_null($jenis_produk_id) && $jenis_produk_id!='')
        $this->db->where("jenis_produk_id=", $jenis_produk_id);

        if(!is_null($kode_produk) && $kode_produk!='')
        $this->db->where("kode_produk=", $kode_produk);

        if(!is_null($kode_produk_vendor) && $kode_produk_vendor!='')
        $this->db->where("kode_produk_vendor=", $kode_produk_vendor);

        if(!is_null($kode_vendor) && $kode_vendor!='')
        $this->db->where("kode_vendor=", $kode_vendor);

        $query = $this->db->get();
        return $query;
    }
}
