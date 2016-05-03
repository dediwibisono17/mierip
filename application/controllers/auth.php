<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library(array('form_validation'));
		$this->load->model(array('user_m'));
	}

	function index() {
		if($this->session->userdata('loggedin') == TRUE) {
			redirect('admin');
		}
		
		$data['meta_title'] = 'Login - Admin Panel';
		$this->load->view('admin/login', $data);
	}

	function login_post() {
		$rules	= array(
			'login'	=> array(
				'field'	=> 'login',
				'label'	=> 'Login',
				'rules'	=> 'trim|xss_clean|required'
			),
			'password'	=> array(
				'field'	=> 'password',
				'label'	=> 'Password',
				'rules'	=> 'trim|required'
			)
		);
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('auth');
		} else {
			$login	= $this->input->post('login');
			$pass	= $this->input->post('password');
			$auth	= $this->user_m->login($login, $pass);

			if(!$auth) {
				$this->session->set_flashdata('error', 'Invalid username and/or password!');
				redirect('auth');
			} else {
				$session	= array(
					'userid'	=> $auth->id,
					'username'	=> $auth->username,
					'email'		=> $auth->email,
					'loggedin'	=> TRUE
				);
				$this->session->set_userdata($session);
				redirect('admin');
			}
		}
	}

	function logout() {
		$this->session->sess_destroy();
		redirect('home');
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */