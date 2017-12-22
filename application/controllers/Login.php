<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library(array('session'));
    $this->load->helper(array('url'));
    //$this->load->model('user_model');
  }

  function index()
  {
      $data['title'] = 'Login';
      $this->load->view('header', $data);
      $this->load->view('login');
      $this->load->view('footer');
  }

}
