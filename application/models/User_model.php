<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

  public function __construct()
  {
      parent::__construct();
      $this->load->database();
  }

  // add new user
  // @return bool true on success, false on failure
  public function addUser($data)
  {
      $this->db->insert('inm_user', $data);
      return true;
  }

  // edit user
  // @return bool true on success, false on failure
  public function update($id, $data)
  {
      $this->db->where('id', $id);
      $this->db->update('inm_user', $data);
      return true;
  }

  // block user
  // 1 = block
  // @return bool true on success, false on failure
  public function blockUser($id)
  {
      $this->db->set('status_id', '1');
      $this->db->where('id', $id);
      $this->db->update('inm_user');
      return true;
  }

  // unblock user
  // 0 = unblock
  // @return bool true on success, false on failure
  public function unblockUser($id)
  {
      $this->db->set('status_id', '0');
      $this->db->where('id', $id);
      $this->db->update('inm_user');
      return true;
  }

  // reset ip address
  // @return bool true on success, false on failure
  public function resetIpAddress($id)
  {
      $this->db->set('ip_address', 'NULL');
      $this->db->where('id', $id);
      $this->db->update('inm_user');
      return true;
  }

  // reset mac address
  // @return bool true on success, false on failure
  public function resetMacAddress($id)
  {
      $this->db->set('mac_address', 'NULL');
      $this->db->where('id', $id);
      $this->db->update('inm_user');
      return true;
  }

  // change password
  // @return bool true on success, false on failure
  public function changePassword($id, $newpassword)
  {
      $this->db->set('password', $newpassword);
      $this->db->where('id', $id);
      $this->db->update('inm_user');
      return true;
  }

  // add cookie
  // @return bool true on success, false on failure
  public function addCookie($id, $cookie)
  {
      $this->db->set('cookie', $cookie);
      $this->db->where('id', $id);
      $this->db->update('inm_user');
      return true;
  }

  // show user by ID
  // @return object, the user object
  public function getUserByID($id)
  {
      return $this->db->get_where('inm_user', array('id' => $id));
  }

  // show all user
  // @return object, the user object
  public function getAllUser()
  {
      return $this->db->get('inm_user');
  }




}
