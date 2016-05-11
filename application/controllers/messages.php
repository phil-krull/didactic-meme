<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class messages extends CI_Controller {

  public function __construct() {
    parent:: __construct();
    $this->load->model('message');
    $this->load->library('form_validation');
  }

  public function create($user_id) {
    $validation_result = $this->message->validate($this->input->post());

      if($validation_result == TRUE) {
        $this->message->create($user_id, $this->session->userdata('id'), $this->input->post());
      } else {
        $this->session->set_flashdata('errors', validation_errors());
      }

    redirect('/users/show/' . $user_id);
  }


}