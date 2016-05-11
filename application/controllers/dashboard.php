<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

  public function __construct() {
    parent:: __construct();
    $this->load->model('user');
  }

  public function show() {
    $users = $this->user->show();

    if($this->session->userdata('user_level') == "Admin") {
      $this->load->view('Dashboard/show_admin', array('users' => $users));
    } else {
      $this->load->view('Dashboard/show', array('users' => $users));
    }
  }

}