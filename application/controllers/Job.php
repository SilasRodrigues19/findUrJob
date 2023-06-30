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

	function redirectIfLoggedIn() 
	{
			if ($this->session->has_userdata('usuario')) {
					$redirect_url = $this->session->userdata('redirect_url') ?? '/';
					redirect($redirect_url);
			}
	}


	public function job()
	{

		/* if($this->input->post('submitBtn') && (empty($this->input->post('search'))) || $this->input->post('search') === '') {
			notify('', 'O filtro está vazio', 'info');
			header("Location: ".$_SERVER['REQUEST_URI']);
    	exit();
		} */


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
			$res = $this->mjob->archiveJob("'" . $id . "'");
			$data['archiveJob'] = $res;

			if($res) {
				notify('', 'Vaga arquivada', 'success');
				redirect('/job/archived');
			}
		}

		
		$id = $this->input->post('deleteId');

		if (!empty($this->input->post('deleteId'))) {
			$res = $this->mjob->deleteJob($id);

			if($res['success']) {
				notify('', $res['msg'], 'success');
			} else {
				notify('', $res['msg'], 'error');
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

		$data['job_title'] = $this->input->post('job_title');
		$data['job_requirements'] = $this->input->post('job_requirements');
		$data['job_link'] = $this->input->post('job_link');
		$data['job_level'] = $this->input->post('job_level');
		$data['job_currency'] = $this->input->post('job_currency');
		$data['job_mode'] = $this->input->post('job_mode');
		$data['job_contract'] = $this->input->post('job_contract');
		$data['job_email'] = $this->input->post('job_email');
		$data['job_salary'] = $this->input->post('job_salary');
		$data['job_experience'] = $this->input->post('job_experience');
		$data['job_observation'] = $this->input->post('job_observation');
		$data['job_post_user'] = $this->input->post('job_post_user');

		$data['send'] = $this->input->post('send');


		$messages = [
			'job_title' => 'Informe o título',
			'job_requirements' => 'Informe os requisitos',
			'job_link' => 'Informe uma URL válida',
			'job_level' => 'Informe o nível',
			'job_salary' => 'Informe o salário',
			'job_mode' => 'Informe a modalidade',
			'job_contract' => 'Informe o tipo de contrato',
		];

		$isValid = true;

		foreach ($messages as $key => $message):
				if (empty($data[$key]) && isset($data['send'])):
						notify('', $message, 'info');
						$isValid = false;
						break;
				elseif ($key === 'job_link' && !empty($data['job_link']) && !filter_var($data['job_link'], FILTER_VALIDATE_URL)):
						notify('', $message, 'info');
						$isValid = false;
						break;
				endif;
		endforeach;


		if($isValid && !empty($data['job_title'])) {
			$res = $this->mjob->addJob($data);

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

		if($this->input->server('REQUEST_METHOD') == 'POST' && empty($this->input->post('report_job_id'))) {
			notify('', 'Informe o ID da vaga', 'info');
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

		$accesskey = $this->input->post('archivejob');
		$id = $this->input->post('archivejob_id');

		if($accesskey == 123) {
			$res = $this->mjob->archiveJob("'" . $id . "'");
			$data['archiveJob'] = $res;

			if($res) {
				notify('', 'Vaga desarquivada', 'success');
				redirect('/job');
			}
		}


		$data['title'] = 'Vagas arquivadas ' . '(' .$data['countArchivedJobs']['countArchivedJobs']. ')' ;

		$this->is_logged_in();

		$this->load->view('templates/header', $data);
		$this->load->view('pages/archived', $data);
		$this->load->view('templates/footer', $data);
	}

	public function published()
	{

		$this->is_logged_in();
		
		$data['title'] = 'Minhas vagas publicadas';

		$res = $this->mjob->getPublishedJobsByUser();
		$data['showPublishedJobsByLoggedInUser'] = $res;

		$this->load->view('templates/header', $data);
		$this->load->view('pages/published', $data);
		$this->load->view('templates/footer', $data);
	}

	public function reported()
	{
		$this->is_logged_in();

		$data['title'] = 'Vagas reportadas';

		$res = $this->mjob->getReportedJobs();
		$data['listReportedJobs'] = $res;

		$this->load->view('templates/header', $data);
		$this->load->view('pages/reported', $data);
		$this->load->view('templates/footer', $data);
	}


	public function forgot_password()
	{

			$this->redirectIfLoggedIn();

			$email = $this->input->post('email');
			

			$data['token'] = $this->input->get('token');
			$data['email'] = $this->input->get('email');
			
			$dynamicTitle = isset($data['token']) ? 'Altere sua senha' : 'Solicitar redefinição de senha';
      $data['title'] = $dynamicTitle;

			// Mocked email
			// $email = 'silasrodrigues.fatec@gmail.com';

			$res = $this->mauth->getEmailSecret();
			$dados['emailSecret'] = $res;

			if(!empty($email)) {
					$dados['email'] = $email;
					$res = $this->mauth->validateMail($dados);
					
					if($res['success']) {
							$token = bin2hex(random_bytes(32));
							$resetLink = base_url('job/forgot-password?token=' . $token . '&email=' . urlencode($email));

							$email_config = [
								'protocol'   => 'smtp',
								'smtp_host'  => 'smtp.gmail.com',
								'smtp_port'  => '587',
								'smtp_crypto'=> 'tls',
								'smtp_user'  => 'silasrodrigues.fatec@gmail.com',
								'smtp_pass'  => $dados['emailSecret'],
								'mailtype'   => 'html',
								'starttls'   => true,
								'newline'    => "\r\n"
							];


							$this->load->library('email', $email_config);

							$this->email->from('silasrodrigues.fatec@gmail.com');
							$this->email->to($email);
							$this->email->subject('Solicitação de redefinir a senha');
							$this->email->message('
																		<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
																			<tbody>
																				<tr>
																					<td style="word-break:break-word;font-size:0px;padding:0px" align="left">
																						<div
																							style="color:#737f8d;font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:16px;line-height:24px;text-align:left">
																							<h2
																								style="font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-weight:500;font-size:20px;color:#4f545c;letter-spacing:0.27px margin: 10px 0">
																								Solicitação de redefinir a senha
																							</h2>
																							<p>Olá.</p>
																							<p>Recebemos uma solicitação para redefinir a sua senha. Se você não solicitou essa redefinição, por favor desconsidere
																							este e-mail.</p>
																							<p>Para alterar sua senha clique no botão abaixo para ser redirecionado:</p>
																						</div>
																					</td>
																				</tr>
																				<tr>
																					<td style="word-break:break-word;font-size:0px;padding:10px 25px;padding-top:20px" align="center">
																						<table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:separate" align="center"
																							border="0">
																							<tbody>
																								<tr>
																									<td style="border:none;color:white;" align="center" valign="middle"
																										bgcolor="#5865f2">
																										<a
																											href="' . $resetLink . '"
																											style="text-decoration:none;line-height:100%;padding:15px 19px;border-radius:3px;background:#5865f2;color:white;font-family:Ubuntu,Helvetica,Arial,sans-serif;font-size:15px;font-weight:normal;text-transform:none;margin:0px"
																											target="_blank"
																											>
																											Redefinir senha
																										</a>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>
																				</tr>
																				<tr>
																					<td style="word-break:break-word;font-size:0px;padding:30px 0px">
																						<p style="font-size:1px;margin:0px auto;border-top:1px solid #dcddde;width:100%"></p>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<div style="margin:0px auto;max-width:640px;background:transparent">
																			<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:transparent"
																				align="center" border="0">
																				<tbody>
																					<tr>
																						<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px">
																							<div aria-labelledby="mj-column-per-100" class="m_4490126977024612303mj-column-per-100"
																								style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
																								<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
																									<tbody>
																										<tr>
																											<td style="word-break:break-word;font-size:0px;padding:0px" align="center">
																												<div
																													style="color:#99aab5;font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:12px;line-height:24px;text-align:center">
																													Enviado pelo sistema 
																													<a href="' . base_url() . '"
																															style="color:#1eb0f4;text-decoration:none" target="_blank">
																															FindUrJob
																													</a>
																												</div>
																											</td>
																										</tr>
																									</tbody>
																								</table>
																							</div>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</div>
																');


							// echo $this->email->print_debugger();

							if ($this->email->send()) {
									notify('', 'Link enviado para o e-mail informado', 'success');
							} else {
									notify('', 'Falha ao enviar o link', 'error');
							}
					} else {
							notify('', $res['error'], 'error');
					}
			}

			$data['newPassword'] = $this->input->post('password');
			$data['cPassword'] = $this->input->post('confirm_password');
			$data['send'] = $this->input->post('send');

			$messages = [
				'email' => 'Informe o e-mail',
			];

			foreach($messages as $key => $message):
				(empty($data[$key]) && !isset($data['send']) && !isset($data['token'])) && notify('', $message, 'info');
			endforeach;

			if(empty($data['newPassword']) && isset($data['send']) && isset($data['token'])) {
				notify('', 'Informe sua nova senha', 'info');
			}

			if (!empty($data['newPassword']) && isset($data['token']) && strlen(trim($data['token'])) === 64 && isset($data['send'])) {
					if (strcmp($data['newPassword'], $data['cPassword']) === 0) {
							$res = $this->mauth->resetPassword($data);

							if ($res['success']) {
									notify('', $res['msg'], 'success');
									redirect('/job/signin');
							} else {
									notify('', $res['msg'], 'error');
									redirect('/job/forgot-password');
							}
					} else {
							notify('', 'As senhas não são iguais', 'error');
							//redirect(base_url('job/forgot-password?token=' . $data['token'] . '&email=' . urlencode($data['email'])));
					}
			}


			$this->load->view('templates/header', $data);
			$this->load->view('pages/auth/forgot-password', $data);
			$this->load->view('templates/footer', $data);
	}


	public function signup()
	{
			$data['title'] = 'Realize seu cadastro';

			$this->redirectIfLoggedIn();

			$data['email'] = $this->input->post('email');
			$data['user'] = $this->input->post('user');
			$data['password'] = $this->input->post('password');
			$data['send'] = $this->input->post('send');

			$messages = [
					'password' => 'Informe a senha',
					'user' => 'Informe o usuário',
					'email' => 'Informe o e-mail',
			];

			foreach ($messages as $key => $message) {
					(empty($data[$key]) && isset($data['send'])) && notify('', $message, 'info');
			}

			if (!empty($this->input->post('user'))) {
					$usernameExists = $this->mauth->checkUsernameExists($data['user']);
					if ($usernameExists) {
							notify('', 'Usuário já existe', 'error');
					}
			}

			if (!empty($this->input->post('email'))) {
					$emailExists = $this->mauth->checkEmailExists($data['email']);
					if ($emailExists) {
							notify('', 'E-mail já cadastrado.', 'error');
					}
			}

			if (!empty($this->input->post('user')) && !empty($this->input->post('password')) && !empty($this->input->post('email'))) {
					if (!$usernameExists && !$emailExists) {
							$res = $this->mauth->signUpUser($data);
							if ($res === true) {
									notify('', 'Usuário cadastrado', 'success');
									redirect('/job/signin');
							}
					}
			}

			$this->load->view('templates/header', $data);
			$this->load->view('pages/auth/signup', $data);
			$this->load->view('templates/footer', $data);
	}

	
	public function signin()
	{
		$data['title'] = 'Faça login';

    $this->redirectIfLoggedIn();

		$data['user'] = $this->input->post('user');
		$data['password'] = $this->input->post('password');
		$data['send'] = $this->input->post('send');

		$messages = [
			'password' => 'Informe a senha',
			'user' => 'Informe o usuário',
		];

		foreach($messages as $key => $message):
			(empty($data[$key]) && isset($data['send'])) && notify('', $message, 'info');
		endforeach;


		if (!empty($this->input->post('user')) && !empty($this->input->post('password'))) {
			$res = $this->mauth->signInUser($data);

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