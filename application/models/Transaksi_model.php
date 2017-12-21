<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  // keterangan
  //-- (tarif daya, BL/TH, stand meter, non_subsidi) --> PLN postpaid
  //-- (tarif daya, jumlah_kwh, no_token) --> PLN prepaid
  //-- (jenis_transaksi, no_registrasi, tgl_registrasi) --> PLN non-taglis
  //-- (kode_pdam, golongan, periode, meteran) --> PDAM
  //-- (kode_telkom, divre/datel, periode) --> TELKOM
  //-- (kode_hp, divre/datel, periode) --> pulsa

  // insert transaksi
  // isi array $transaksi (user_id, kode_transaksi, tgl_transaksi)
  // isi array $detail (status_id, nama_pelanggan, lembar, jumlah_tagihan, biaya_admin, total_tagihan, jenis_transaksi, inf_referensi, referensi_number, terbilang, kode_cetak, kode_supplier, print_out, keterangan, response)
  public function addTransaksi($transaksi, $detail)
  {
      $this->db->insert('inm_transaksi', $transaksi);
      $lastId = $this->db->insert_id();
      foreach($detail as $val)
      {
          $detail = array_push($data, 'transkasi_id', $lastId);
          $this->db->insert('inm_transaksi_detail');
      }
      return true;
  }

  // show transaksi by kode produk
  public function getTransaksiByKodeProduk($)
  {
      # code...
  }

  // show transaksi by user
  public function getTransaksiByUser($user_id)
  {
      $this->db->select('*');
      $this->db->from('inm_transaksi a');
      $this->db->join('inm_transaksi_detail b', 'a.id = b.transaksi_id');
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

  // show transaksi by status transaksi
  public function getTransaksiByStatus($status)
  {
      $this->db->select('*');
      $this->db->from('inm_transaksi a');
      $this->db->join('inm_transaksi_detail b', 'a.id = b.transaksi_id');
      $this->db->where('a.status_id', $status);
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

  // show transaksi by date
  public function getTransaksiByDate($date)
  {
      $this->db->select('*');
      $this->db->from('inm_transaksi a');
      $this->db->join('inm_transaksi_detail b', 'a.id = b.transaksi_id');
      $this->db->where('a.tgl_transaksi', $date);
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

  // show transkasi by Start Date - End Date
  public function getTransaksiByIntervalDate($start_date, $end_date)
  {
      $this->db->select('*');
      $this->db->from('inm_transaksi a');
      $this->db->join('inm_transaksi_detail b', 'a.id = b.transaksi_id');
      $this->db->where('a.tgl_transaksi >=', $start_date);
      $this->db->where('a.tgl_transaksi <=', $end_date);
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

  // show transkasi by User & Date
  public function getTransaksiByUserAndDate($user_id, $date)
  {
      $this->db->select('*');
      $this->db->from('inm_transaksi a');
      $this->db->join('inm_transaksi_detail b', 'a.id = b.transaksi_id');
      $this->db->where('a.user_id', $user_id);
      $this->db->where('a.tgl_transaksi', $date);
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

  // show transkasi by User & Start Date - End Date
  public function getTransaksiByUserAndIntervalDate($user_id, $start_date, $end_date)
  {
      $this->db->select('*');
      $this->db->from('inm_transaksi a');
      $this->db->join('inm_transaksi_detail b', 'a.id = b.transaksi_id');
      $this->db->where('a.user_id', $user_id);
      $this->db->where('a.tgl_transaksi >=', $start_date);
      $this->db->where('a.tgl_transaksi <=', $end_date);
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
