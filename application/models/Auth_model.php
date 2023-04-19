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

  public function isUserActive($username)
  {
     $this->db->select('user_is_active');
     $this->db->where('user_name', $username);
     $select = $this->db->get('users');
    
     if ($select->num_rows() > 0) {
         $user = $select->row();
         return $user->user_is_active == 1;
     }
    
     return false;
  }



  public function signInUser($dados)
    {
        $username = $dados['user'];
        
        $is_active = $this->isUserActive($username);

        if (!$is_active) {
            return array(
                'success' => false,
                'error' => 'O usuário <strong>' . $username . '</strong> está inativo',
            );
        }

        $this->db->where('user_name', $username);
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