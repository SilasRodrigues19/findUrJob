<?php

class Job_model extends CI_Model {

  public function showJob()
  {
    $select = "SELECT * from jobs";

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

    $insert = "INSERT INTO jobs (job_description, job_link, job_level, job_currency, job_mode, job_contract, job_salary, job_experience) 
    VALUES ('{$dados['job_description']}', '{$dados['job_link']}', '{$dados['job_level']}', 
            '{$dados['job_currency']}', '{$dados['job_mode']}', 
            '{$dados['job_contract']}', '{$dados['job_salary']}', '{$dados['job_experience']}')";

            
    $execute = $this->db->query($insert);

    return ($execute) ? true : false;

  }

}