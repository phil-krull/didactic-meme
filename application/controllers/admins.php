<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admins extends CI_Controller {

  public function __construct() {
    parent:: __construct();
    $this->load->model('user');
    $this->load->library('form_validation');
  }

  public function edit($id) {
    $user = $this->user->edit($id);
    $this->load->view('Admins/edit', array('user' => $user));
  }

  public function update($id) {
    $user = $this->user->edit($id);

    if($user['email'] == $this->input->post('email')) {

      $validation_result = $this->user->admin_update_validate($this->input->post());

      if($validation_result == TRUE) {
        $this->user->admin_update_no_email($id, $this->input->post());
      } else {
        $this->session->set_flashdata('errors', validation_errors());
      }
    } else {

      $validation_result = $this->user->admin_email_validate($this->input->post());

      if($validation_result == TRUE) {
        $this->user->admin_update($id, $this->input->post());
      } else {
        $this->session->set_flashdata('errors', validation_errors());
      }
    }
      redirect('/dashboard');
  }

  public function destroy($id) {
    $this->user->destroy($id);
    redirect('/dashboard');
  }
}