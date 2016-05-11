<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sessions extends CI_Controller {

  public function signin() {
    $this->load->view('/signin');
  }

  public function create() {
    $this->load->model("user");
    $user = $this->user->login($this->input->post('email'));

    if ($user && password_verify($this->input->post('password'), $user['password'])) {
      $user_info = array(
        'id' => $user['id'],
        'first_name' => $user['first_name'],
        'last_name' => $user['last_name'],
        'email' => $user['email'],
        'user_level' => $user['user_level'],
        'is_logged_in' => TRUE
      );
      $this->session->set_userdata($user_info);
    } else { 
      $this->session->set_flashdata('errors', 'Invalid email or password');
      redirect('/login');
    }
    redirect('/dashboard');
  }

  public function destroy() {
    $this->session->sess_destroy();
    redirect('/');
  }
}