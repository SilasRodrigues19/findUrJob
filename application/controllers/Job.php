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
		$data['title'] = 'Vagas publicadas';

		$data['search'] = $this->input->post('search');

		$res = $this->mjob->showJob($data['search']);
		$data['showJob'] = $res;

		$res = $this->mjob->totalJobs();
		$data['countJobs'] = $res[0];


		$this->load->view('templates/header', $data);
		$this->load->view('pages/job', $data);
		$this->load->view('templates/footer', $data);
	}

	public function new()
	{
		$data['title'] = 'Publique uma vaga';

		$dados['job_description'] = $this->input->post('job_description');
		$dados['job_link'] = $this->input->post('job_link');
		$dados['job_level'] = $this->input->post('job_level');
		$dados['job_currency'] = $this->input->post('job_currency');
		/*$dados['job_requirements'] = $this->input->post('job_requirements');*/
		$dados['job_mode'] = $this->input->post('job_mode');
		$dados['job_contract'] = $this->input->post('job_contract');
		$dados['job_salary'] = $this->input->post('job_salary');
		$dados['job_experience'] = $this->input->post('job_experience');

		if(isset($dados['job_experience'])) {

			$res = $this->mjob->addJob($dados);

			if($res) {
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
		$data['title'] = 'Arquivadas';

		$this->load->view('templates/header', $data);
		$this->load->view('pages/archived', $data);
		$this->load->view('templates/footer', $data);
	}

}