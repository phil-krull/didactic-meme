<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class posts extends CI_Controller {

  public function __construct() {
    parent:: __construct();
    $this->load->model('post');
    $this->load->library('form_validation');
  }

  public function create($message_id, $message_user_id) {
    $validation_result = $this->post->validate($this->input->post());

      if($validation_result == TRUE) {
        $this->post->create($message_id, $this->session->userdata('id'), $this->input->post());
      } else {
        $this->session->set_flashdata('errors', validation_errors());
      }
    redirect('/users/show/' . $message_user_id);
  }


}