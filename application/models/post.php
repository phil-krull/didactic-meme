<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class post extends CI_Model {

  public function show($id) {
    $query = "SELECT content, posts.message_id AS message_id, posts.created_at, users.id AS users_id, users.first_name, users.last_name FROM posts JOIN users ON users.id = posts.user_id WHERE posts.message_id = ? ORDER by posts.created_at ASC";
    $values = array($id);

    return $this->db->query($query, $values)->result_array();
  }

  public function create($message_id, $user_id, $post) {
    $query = "INSERT INTO posts (content, message_id, user_id, created_at, updated_at) VALUES (?,?,?,NOW(),NOW())";
    $values = array(
      $post['content'],
      $message_id,
      $user_id
    );

    return $this->db->query($query, $values);
  }

  public function validate() {
    $this->form_validation->set_rules('content', 'Comment', 'required');

    return $this->form_validation->run();
  }

}