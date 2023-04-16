<?php

class Job_model extends CI_Model {

  public function showJob($searchTerm = false)
  {

    $where = false;

    if($searchTerm) {
      $where = "WHERE CONCAT(job_title, job_requirements, job_link, job_level, job_salary, job_currency, job_mode, job_contract) LIKE '%{$searchTerm}%'";
    }

    $select = "SELECT *,
      CASE 
        WHEN job_currency = 'Real' THEN 'R$'
        WHEN job_currency = 'Dollar' THEN '$'
        WHEN job_currency = 'Euro' THEN '€'
      END AS job_currency_symbol
    FROM jobs {$where}";

    //echo $select; exit();

    $execute = $this->db->query($select);

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();
  }

  public function showJobCount($searchTerm = false)
  {

    $where = false;

    if($searchTerm) {
      $where = "WHERE CONCAT(job_title, job_requirements, job_link, job_level, job_salary, job_currency, job_mode, job_contract) LIKE '%{$searchTerm}%'";
    }

    $select = "SELECT COUNT(*) AS count FROM jobs {$where}";

    //echo $select; exit();

    
    $execute = $this->db->query($select);


    return ($execute->num_rows() > 0) ? $execute->result_array() : array();
  }

  public function totalJobs()
  {
    $select = "SELECT COUNT(*) AS countJobs FROM jobs WHERE job_is_archived = 0";

    $execute = $this->db->query($select);

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();
  }

  public function totalArchivedJobs()
  {
    $select = "SELECT COUNT(*) AS countArchivedJobs FROM jobs WHERE job_is_archived = 1";

    $execute = $this->db->query($select);

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();
  }


  public function addJob($dados)
  {

    $insert = "INSERT INTO jobs (job_title, job_requirements, job_link, job_level, job_currency, job_mode, job_contract, job_email, job_salary, job_experience, job_is_archived, job_observation) 
    VALUES ('{$dados['job_title']}', '{$dados['job_requirements']}', '{$dados['job_link']}', '{$dados['job_level']}', 
            '{$dados['job_currency']}', '{$dados['job_mode']}', '{$dados['job_contract']}', '{$dados['job_email']}', '{$dados['job_salary']}', 
            '{$dados['job_experience']}', false, '{$dados['job_observation']}')";

    //echo $insert; exit();
    $execute = $this->db->query($insert);

    return ($execute) ? true : false;

  }

  public function archivedJobs()
  {

    $select = "SELECT *, CASE 
                          WHEN job_currency = 'Real' THEN 'R$'
                          WHEN job_currency = 'Dollar' THEN '$'
                          WHEN job_currency = 'Euro' THEN '€'
                        END AS job_currency_symbol 
              FROM jobs WHERE job_is_archived = 1";

    $execute = $this->db->query($select);

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();

  }

  public function archiveJob($id)
  {

    $update = "UPDATE jobs SET job_is_archived = 1 WHERE job_id = {$id}";

    //echo $update; exit();

    $execute = $this->db->query($update);

    return ($execute) ? true : false;
    
  }

  public function signUpUser($dados)
  {

    $md5_password = md5($dados['password']);

    $insert = "INSERT INTO users (user_name, user_login, user_password, user_email, user_level, user_is_active, created_at) VALUES 
    ('{$dados['user']}', 'user', '{$md5_password}', '{$dados['email']}', 0, 1, NOW())";

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
        'user_id' => $select->row()->user_id,
      );
    } else {
      return array(
        'success' => false,
        'error' => 'Usuário ou senha incorretos.',
      );
    }
  }


}