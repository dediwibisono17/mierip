<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library(array('form_validation'));
		$this->load->model(array('products_m', 'news_m', 'testimonials_m'));
	}

	function index() {
		$data['meta_title']	= 'Welcome!';
		$data['products']	= $this->products_m->get_all_products();
		$data['news']		= $this->news_m->get_all_news(5, 0);
		$data['testi']		= $this->testimonials_m->get_all_testimonials(5, 0);
		$this->load->view('home', $data);
	}

	function testi_post() {
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_email|required');
		$this->form_validation->set_rules('comment', 'Testimonials', 'trim|required');

		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url() . '#contact');
		} else {
			$data = array(
				'name'		=> $this->input->post('name'),
				'email'		=> $this->input->post('email'),
				'comment'	=> $this->input->post('comment')
			);
			$this->testimonials_m->insert_testimonials($data);
			$this->session->set_flashdata('success', 'Post successfull.');
			redirect(base_url() . '#contact');
		}
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */