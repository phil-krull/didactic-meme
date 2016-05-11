<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Model {

  public function create($post) {
    $query = "INSERT INTO users (first_name, last_name, email, password, user_level, created_at, updated_at) VALUES (?,?,?,?,?,NOW(),NOW())";
    $values = array(
      $post['first_name'],
      $post['last_name'],
      $post['email'],
      password_hash($post['password'],PASSWORD_BCRYPT),
      'Normal'
      );

    return $this->db->query($query, $values);
  }

  public function validate() {
    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirmation]|min_length[8]');
    $this->form_validation->set_rules('password_confirmation', 'Confirm Password', 'required');

    return $this->form_validation->run();
  }

  public function update_validate() {
    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');

    return $this->form_validation->run();
  }


  public function admin_update_validate() {
    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    $this->form_validation->set_rules('user_level', 'User Level', 'required');

    return $this->form_validation->run();
  }

  public function email_validate() {
    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

    return $this->form_validation->run();
  }

  public function admin_email_validate() {
    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    $this->form_validation->set_rules('user_level', 'User Level', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

    return $this->form_validation->run();
  }

  public function password_validate() {
    $this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirmation]|min_length[8]');
    $this->form_validation->set_rules('password_confirmation', 'Confirm Password', 'required');

    return $this->form_validation->run();
  }

  public function login($email) {
    $query = "SELECT * FROM users WHERE email = ?";
    $values = array($email);
    return $this->db->query($query, $values)->row_array();
  }

  public function search_DB() {
    $query = "SELECT COUNT(*) FROM users";
    return $this->db->query($query)->row_array();
  }

  public function admincreate($post) {
    $query = "INSERT INTO users (first_name, last_name, email, password, user_level, created_at, updated_at) VALUES (?,?,?,?,?,NOW(),NOW())";
    $values = array(
      $post['first_name'],
      $post['last_name'],
      $post['email'],
      password_hash($post['password'],PASSWORD_BCRYPT),
      'Admin'
      );

    return $this->db->query($query, $values);
  }

  public function show() {
    $query = "SELECT * FROM users";
    return $this->db->query($query)->result_array();
  }

  public function edit($id) {
    $query = "SELECT * FROM users WHERE id = ?";
    $values = array($id);
    return $this->db->query($query, $values)->row_array();
  }

  public function update($id, $post) {

    $query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, updated_at = NOW() WHERE id = ?";
    $values = array(
      $post['first_name'],
      $post['last_name'],
      $post['email'],
      $id
      );

    return $this->db->query($query, $values);
  }

  public function update_description($id, $post) {
    $query = "UPDATE users SET description = ? WHERE id = ?";
    $values = array($post['description'], $id);

    return $this->db->query($query, $values);
  }

  public function update_no_email($id, $post) {

    $query = "UPDATE users SET first_name = ?, last_name = ?, updated_at = NOW() WHERE id = ?";
    $values = array(
      $post['first_name'],
      $post['last_name'],
      $id
      );

    return $this->db->query($query, $values);
  }

  public function password_update($id, $post) {
    $query = "UPDATE users SET password = ?, updated_at = NOW() WHERE id = ?";
    $values = array(password_hash($post['password'],PASSWORD_BCRYPT), $id);

    return $this->db->query($query, $values);
  }

  public function admin_update($id, $post) {

    $query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, user_level = ?, updated_at = NOW() WHERE id = ?";
    $values = array(
      $post['first_name'],
      $post['last_name'],
      $post['email'],
      $post['user_level'],
      $id
      );

    return $this->db->query($query, $values);
  }

  public function admin_update_no_email($id, $post) {

    $query = "UPDATE users SET first_name = ?, last_name = ?, user_level = ?, updated_at = NOW() WHERE id = ?";
    $values = array(
      $post['first_name'],
      $post['last_name'],
      $post['user_level'],
      $id
      );

    return $this->db->query($query, $values);
  }

  public function destroy($id) {
    $query = "DELETE FROM users WHERE id = ?";
    $values = array($id);

    return $this->db->query($query, $values);
  }

}





