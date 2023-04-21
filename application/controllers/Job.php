<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Job extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Job_model', 'mjob');
		$this->load->model('Auth_model', 'mauth');
	}

	public function index()
	{
		$this->job();
	}

	protected function is_logged_in()
{
    if (!$this->session->userdata('usuario')) {
        // Armazenar a página atual em uma sessão
        $this->session->set_userdata('redirect_url', current_url());
        
        notify('', 'Necessário autenticação.', 'error');
        redirect('/job/signin');
    }
}



	public function job()
	{

		$data['search'] = $this->input->post('search');

		$res = $this->mjob->showJob($data['search']);
		$data['showJob'] = $res;

		$res = $this->mjob->showJobCount($data['search']);
		$data['showJobCount'] = $res;

		$res = $this->mjob->totalJobs();
		$data['countJobs'] = $res[0];

		$accesskey = $this->input->post('archivejob');
		$id = $this->input->post('archivejob_id');

		if($accesskey == 123) {
			$res = $this->mjob->archiveJob($id);
			$data['archiveJob'] = $res;

			if($res) {
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

		$this->is_logged_in();

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
		$dados['job_post_user'] = $this->input->post('job_post_user');

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

		$dados['report_job_id'] = $this->input->post('report_job_id');
		$dados['report_reason'] = $this->input->post('report_reason');
		$dados['report_observation'] = $this->input->post('report_observation');


		if (!empty($this->input->post('report_job_id'))) {
			$res = $this->mjob->reportJob($dados);

			if($res['success']) {
				notify('', $res['msg'], 'success');
				redirect('/job/report');
			} else {
				notify('', $res['msg'], 'error');
				redirect('/job/report');
			}

		}



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

		$this->is_logged_in();

		$this->load->view('templates/header', $data);
		$this->load->view('pages/archived', $data);
		$this->load->view('templates/footer', $data);
	}

	public function forgot_password()
	{
		$data['title'] = 'Altere sua senha';


		$dados['email'] = $this->input->post('email');

		if(!empty($this->input->post('email'))) {
			$res = $this->mauth->validateMail($dados);
			if($res['success']) {
				notify('', 'Email encontrado', 'success');
				redirect('/job/forgot-password');
			} else {
				notify('', $res['error'], 'error');
				redirect('/job/forgot-password');
			}
		}


		$this->load->view('templates/header', $data);
		$this->load->view('pages/auth/forgot-password', $data);
		$this->load->view('templates/footer', $data);

	}

	public function signup()
	{
		$data['title'] = 'Realize seu cadastro';

		if ($this->session->has_userdata('usuario')) {
        redirect('/job');
    }

		$dados['user'] = $this->input->post('user');
		$dados['password'] = $this->input->post('password');
		$dados['email'] = $this->input->post('email');


		if (!empty($this->input->post('user')) && !empty($this->input->post('password')) && !empty($this->input->post('email'))) {
			$res = $this->mauth->signUpUser($dados);
			if($res) {
				notify('', 'Usuário cadastrado', 'success');
				redirect('/job/signin');
			}
		} 

		$this->load->view('templates/header', $data);
		$this->load->view('pages/auth/signup', $data);
		$this->load->view('templates/footer', $data);
	}

	
	public function signin()
	{
		$data['title'] = 'Faça login';

    if ($this->session->has_userdata('usuario')) {
        $redirect_url = $this->session->userdata('redirect_url') ?? '/';
    		redirect($redirect_url);
    }

		$dados['user'] = $this->input->post('user');
		$dados['password'] = $this->input->post('password');

		if (!empty($this->input->post('user')) && !empty($this->input->post('password'))) {
			$res = $this->mauth->signInUser($dados);

			if ($res['success']) {
				$this->session->set_userdata('usuario', $res['user']);

				notify('', 'Login realizado', 'success');
				$redirect_url = $this->session->userdata('redirect_url') ?? '/';
    		redirect($redirect_url);

			} else {
				notify('', $res['error'], 'error');
				redirect('/job/signin');
			}


		} 

		$this->load->view('templates/header', $data);
		$this->load->view('pages/auth/signin', $data);
		$this->load->view('templates/footer', $data);
	}

	public function logout()
	{
			$this->session->sess_destroy();
			redirect(base_url());
	}


}