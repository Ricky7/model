<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logtransaksi_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // jenis log
  // kode log PLN postpaid = 1
  // kode log PLN prepaid = 2
  // kode log PLN nontaglis  = 3
  // kode log PDAM = 4
  // kode log BPJS = 5

  // show log by jenis log
  public function getLogByJenis($jenis_log)
  {
      $this->db->select('*');
      $this->db->from('inm_log_transaksi a');
      $this->db->join('inm_jenis_log b', 'a.jenis_log = b.kode_log');
      $this->db->where('a.jenis_log', $jenis_log);
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

  // show log by User
  public function getLogByUser($user_id)
  {
      $this->db->select('*');
      $this->db->from('inm_log_transaksi a');
      $this->db->join('inm_jenis_log b', 'a.jenis_log = b.kode_log');
      $this->db->where('a.user_id', $user_id);
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

  // show log by Jenis Log & User
  public function getLogByUserAndJenis($user_id, $jenis_log)
  {
      $this->db->select('*');
      $this->db->from('inm_log_transaksi a');
      $this->db->join('inm_jenis_log b', 'a.jenis_log = b.kode_log');
      $this->db->where('a.user_id', $user_id);
      $this->db->where('a.jenis_log', $jenis_log);
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

  // show log by User & Date
  public function getLogByUserAndDate($user_id, $tanggal)
  {
      $this->db->select('*');
      $this->db->from('inm_log_transaksi a');
      $this->db->join('inm_jenis_log b', 'a.jenis_log = b.kode_log');
      $this->db->where('a.user_id', $user_id);
      $this->db->where('a.tgl_create', $tanggal);
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

  // show log by User & Start Date - End Date
  public function getLogByUserAndIntervalDate($user_id, $start_date, $end_date)
  {
      $this->db->select('*');
      $this->db->from('inm_log_transaksi a');
      $this->db->join('inm_jenis_log b', 'a.jenis_log = b.kode_log');
      $this->db->where('a.user_id', $user_id);
      $this->db->where('a.tgl_create >=', $start_date);
      $this->db->where('a.tgl_create <=', $end_date);
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

  // show log by Start Date - End Date
  public function getLogByIntervalDate($start_date, $end_date)
  {
      $this->db->select('*');
      $this->db->from('inm_log_transaksi a');
      $this->db->join('inm_jenis_log b', 'a.jenis_log = b.kode_log');
      $this->db->where('a.tgl_create >=', $start_date);
      $this->db->where('a.tgl_create <=', $end_date);
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

  // insert log by Jenis log
  // isi dalam array $data
  // jenis_log  = kode_log (ada diatas)
  // id_user = id user/loket
  // response_message
  // response_json
  // tgl_create = now
  public function addLog($data)
  {
      $this->db->insert('inm_log_transaksi', $data);
      return true;
  }

}
