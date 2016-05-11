<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class message extends CI_Model {

  public function usershow($id) {
    $query = "SELECT messages.id, messages.created_at, messages.user_id AS message_user_id, content AS message_content, users.id AS users_id, users.first_name AS messager_first_name, users.last_name AS messager_last_name FROM messages JOIN users ON users.id = message_user_id WHERE user_id = ? ORDER BY messages.created_at DESC";
    $values = array($id);

    return $this->db->query($query, $values)->result_array();
  }

  public function validate() {
    $this->form_validation->set_rules('content', 'Message', 'required');

    return $this->form_validation->run();
  }

  public function create($user_id, $messager_id, $post) {
    $query = "INSERT INTO messages (user_id, message_user_id, content, updated_at, created_at) VALUES (?,?,?,NOW(),NOW())";
    $values = array(
        $user_id,
        $messager_id,
        $post['content']
      );

    return $this->db->query($query, $values);
  }

}