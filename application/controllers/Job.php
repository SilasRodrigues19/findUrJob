<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Job extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Job_model', 'mjob');
    }

    public function index()
    {
        $this->job();
    }

    public function job()
    {
        $data['search'] = $this->input->post('search');

        $res = $this->mjob->showJob($data['search']);
        $data['showJob'] = $res;

        $res = $this->mjob->totalJobs();
        $data['countJobs'] = $res[0];

        $accesskey = $this->input->post('archivejob');
        $id = $this->input->post('archivejob_id');

        if ($accesskey == 123) {
            $res = $this->mjob->archiveJob($id);
            $data['archiveJob'] = $res;

            if ($res) {
                notify('', 'Vaga arquivada', 'success');
                redirect('/job/archived');
            }
        }


        $data['title'] = 'Vagas publicadas ' . '(' .$data['countJobs']['countJobs']. ')' ;

        $this->load->view('templates/header', $data);
        $this->load->view('pages/job', $data);
        $this->load->view('templates/footer', $data);
    }

    public function new()
    {
        $data['title'] = 'Publique uma vaga';

        $dados['job_title'] = $this->input->post('job_title');
        $dados['job_requirements'] = $this->input->post('job_requirements');
        $dados['job_link'] = $this->input->post('job_link');
        $dados['job_level'] = $this->input->post('job_level');
        $dados['job_currency'] = $this->input->post('job_currency');
        $dados['job_mode'] = $this->input->post('job_mode');
        $dados['job_contract'] = $this->input->post('job_contract');
        $dados['job_email'] = $this->input->post('job_email');
        $dados['job_salary'] = $this->input->post('job_salary');
        $dados['job_experience'] = $this->input->post('job_experience');
        $dados['job_observation'] = $this->input->post('job_observation');

        if (isset($dados['job_experience'])) {
            $res = $this->mjob->addJob($dados);

            if ($res) {
                notify('', 'Vaga adicionada', 'success');
                redirect('/');
            }
        }


        $this->load->view('templates/header', $data);
        $this->load->view('pages/new', $data);
        $this->load->view('templates/footer', $data);
    }

    public function about()
    {
        $data['title'] = 'Sobre';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/about', $data);
        $this->load->view('templates/footer', $data);
    }

    public function report()
    {
        $data['title'] = 'Denuncie';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/report', $data);
        $this->load->view('templates/footer', $data);
    }

    public function archived()
    {
        $res = $this->mjob->totalArchivedJobs();
        $data['countArchivedJobs'] = $res[0];

        $res = $this->mjob->archivedJobs();
        $data['archivedJobs'] = $res;

        $data['title'] = 'Vagas arquivadas ' . '(' .$data['countArchivedJobs']['countArchivedJobs']. ')' ;

        $this->load->view('templates/header', $data);
        $this->load->view('pages/archived', $data);
        $this->load->view('templates/footer', $data);
    }
}
