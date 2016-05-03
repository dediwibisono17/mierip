<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Login checks
		if( ! $this->session->userdata('loggedin')) {
			$this->session->set_flashdata('error', 'Please login to continue.');
			redirect('auth');
		}
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */