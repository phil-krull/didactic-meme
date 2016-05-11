<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller {

  public function __construct() {
    parent:: __construct();
    $this->load->model('user');
    $this->load->library('form_validation');
  }

  public function index() {
    $this->load->view('Users/index');
  }

  public function register() {
    $this->load->view('/register');
  }

  public function newuser() {
    $this->load->view('Users/new');
  }

  public function show($id) {
    $this->load->model('message');
    $this->load->model('post');

    $user = $this->user->edit($id);

    $messages = $this->message->usershow($id);

    $posts = [];

    foreach ($messages as $key => $value) {
      array_push($posts, $this->post->show($value['id']));
    }

    $this->load->view('Users/show', array('user' => $user, 'messages' => $messages, 'posts' => $posts));
  }

  public function create() {
    $is_admin = $this->user->search_DB();

    if($is_admin['COUNT(*)'] == '0') {

      $validation_result = $this->user->validate($this->input->post());

      if($validation_result == TRUE) {
        $this->User->admincreate($this->input->post());
      } else {
        $this->session->set_flashdata('errors', validation_errors());
        redirect('/register');
      }
    } else {

      $validation_result = $this->user->validate($this->input->post());

      if($validation_result == TRUE) {
        $this->user->create($this->input->post());
      } else {
        $this->session->set_flashdata('errors', validation_errors());
        redirect('/register');
      }
    }
    if($this->session->userdata('is_logged_in') == TRUE) {
      redirect('/dashboard');
    } else {
      redirect('/login');
    }
  }

  public function edit() {
    $user = $this->user->edit($this->session->userdata('id'));
    $this->load->view('Users/edit', array('user' => $user));
  }

  public function update($id) {
    $user = $this->user->edit($id);

    if($this->input->post('description')) {
      $this->user->update_description($id, $this->input->post());
    } else {
      if($user['email'] == $this->input->post('email')) {

        $validation_result = $this->user->update_validate($this->input->post());

        if($validation_result == TRUE) {
          $this->user->update_no_email($id, $this->input->post());
        } else {
          $this->session->set_flashdata('errors', validation_errors());
        }
      } else {

        $validation_result = $this->user->email_validate($this->input->post());

        if($validation_result == TRUE) {
          $this->user->update($id, $this->input->post());
        } else {
          $this->session->set_flashdata('errors', validation_errors());
        }
      }
    }
      redirect('/dashboard');
  }

  public function password_update($id) {
    $validation_result = $this->user->password_validate($this->input->post());

    if($validation_result == TRUE) {
      $this->user->password_update($id, $this->input->post());
    } else {
      $this->session->set_flashdata('errors', validation_errors());
    }
    redirect('/dashboard');
  }

}





