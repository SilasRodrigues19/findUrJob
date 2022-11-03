<?php

class Job_model extends CI_Model {

  public function showJob($searchTerm = false)
  {

    $where = false;

    if($searchTerm) {
      $where = "WHERE CONCAT(job_description, job_link, job_level, job_salary, job_currency, job_mode, job_contract) LIKE '%{$searchTerm}%'";
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

  public function totalJobs()
  {
    $select = "SELECT COUNT(*) AS countJobs FROM jobs;";

    $execute = $this->db->query($select);

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();
  }

  public function addJob($dados)
  {

    $insert = "INSERT INTO jobs (job_description, job_link, job_level, job_currency, job_mode, job_contract, job_salary, job_experience, job_is_archived) 
    VALUES ('{$dados['job_description']}', '{$dados['job_link']}', '{$dados['job_level']}', 
            '{$dados['job_currency']}', '{$dados['job_mode']}', 
            '{$dados['job_contract']}', '{$dados['job_salary']}', '{$dados['job_experience']}', '{$dados['job_is_archived']}')";

            
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

}