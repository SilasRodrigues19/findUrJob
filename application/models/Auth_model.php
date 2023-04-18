<?php

class Auth_model extends CI_Model {

  public function signUpUser($dados)
  {

    $argon_password = password_hash($dados['password'], PASSWORD_ARGON2I);

    $insert = "INSERT INTO users (user_name, user_password, user_email, created_at) VALUES 
    ('{$dados['user']}', '{$argon_password}', '{$dados['email']}', NOW())";

    /* echo $insert; exit(); */

    $execute = $this->db->query($insert);

    return ($execute) ? true : false;

  }


  public function signInUser($dados)
  {
      $this->db->where('user_name', $dados['user']);
      $select = $this->db->get('users');

      if ($select->num_rows() > 0) {
          $user = $select->row();
          if (password_verify($dados['password'], $user->user_password)) {
              return array(
                  'success' => true,
                  'user' => $user,
              );
          }
      }
      
      return array(
          'success' => false,
          'error' => 'Usuário ou senha incorretos.',
      );
  }

  public function validateMail($dados)
  {

    $this->db->where('user_email', $dados['email']);
    $select = $this->db->get('users');

    if ($select->num_rows() > 0) {

        return array(
                  'success' => true,
                  'mail' => $dados['email'],
              );
    } else {
        return array(
                  'success' => false,
                  'error' => 'Email não encontrado',
              );
    }


  }

  
}