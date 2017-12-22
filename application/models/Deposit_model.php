<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // status deposit tiket
  // 1 = proses
  // 2 = sukses

  // show all deposit tiket proses
  public function getAllDepositTiketProses()
  {
      return $this->db->get_where('inm_deposit_tiket', array('status_id' => '1'));
  }

  // show all deposit tiket sukses
  public function getAllDepositTiketSukses()
  {
      return $this->db->get_where('inm_deposit_tiket', array('status_id' => '2'));
  }

  // insert deposit tiket
  // isi array $data (user_id, ca_id, tgl_setor, tgl_create, metode_bayar, akun_bank_id(join to inm_akun_bank), keterangan, nominal, status_id(1 = proses))
  public function insertDepositTiket($data)
  {
      $this->db->insert('inm_deposit_tiket', $data);
      return true;
  }

  // update deposit tiket status menjadi sukses = 2
  public function updateDepositTiketStatus($id)
  {
      $this->db->set('status_id', '2');
      $this->db->where('id', $id);
      $this->db->update('inm_deposit_tiket');
      return true;
  }

  // show all deposit langsung proses
  public function getAllDepositLangsungProses()
  {
      return $this->db->get_where('inm_deposit_langsung', array('status_id' => '1'));
  }

  // show all deposit langsung sukses
  public function getAllDepositLangsungSukses()
  {
      return $this->db->get_where('inm_deposit_langsung', array('status_id' => '2'));
  }

  // insert deposit langsung
  // isi array $data (user_id, tgl_setor, tgl_create, nominal, keterangan, admin_id, bukti_bayar)
  public function insertDepositLangsung($data)
  {
      $this->db->insert('inm_deposit_langsung', $data);
      return true;
  }

  // update deposit langsung menjadi sukses = 2
  public function updateDepositLangsungStatus($id)
  {
      $this->db->set('status_id', '2');
      $this->db->where('id', $id);
      $this->db->update('inm_deposit_langsung');
      return true;
  }

}
