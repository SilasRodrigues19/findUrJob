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

		$res = $this->mjob->showJob();
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

		$res = $this->mjob->listJobLevel();
		$data['listJobLevel'] = $res;

		$this->load->view('templates/header', $data);
		$this->load->view('pages/new', $data);
		$this->load->view('templates/footer', $data);
	}


}