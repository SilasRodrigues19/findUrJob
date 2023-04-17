<?php

class Auth_model extends CI_Model {

  public function signUpUser($dados)
  {

    $md5_password = md5($dados['password']);

    $insert = "INSERT INTO users (user_name, user_password, user_email, created_at) VALUES 
    ('{$dados['user']}', '{$md5_password}', '{$dados['email']}', NOW())";

    /* echo $insert; exit(); */

    $execute = $this->db->query($insert);

    return ($execute) ? true : false;

  }


  public function signInUser($dados)
  {
    $this->db->where('user_name', $dados['user']);
    $this->db->where('user_password', MD5($dados['password']));

    $select = $this->db->get('users');

    /* echo $this->db->last_query();
        exit;
    */
    
    if ($select->num_rows() > 0) {
      return array(
        'success' => true,
        'user' => $select->row(),
      );
    } else {
      return array(
        'success' => false,
        'error' => 'Usuário ou senha incorretos.',
      );
    }
  }
  
}