<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saldo_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // add Saldo
  // isi array $data (user_id, jumlah_saldo, tgl_update)
  public function addSaldo($data)
  {
      $this->db->insert('inm_saldo_user', $data);
      return true;
  }

  // update Saldo
  // isi array $data (jumlah_saldo, tgl_update)
  public function updateSaldo($user_id, $data)
  {
      $this->db->where('user_id', $user_id);
      $this->db->update('inm_saldo_user', $data);
      return true;
  }

  // show saldo by user
  public function getSaldoByUser($user_id)
  {
      return $this->db->get_where('inm_saldo_user', array('user_id' => $user_id));
  }

  // show all saldo
  public function getAllSaldo()
  {
      return $this->db->get('inm_saldo_user');
  }

}
