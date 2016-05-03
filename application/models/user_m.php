<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_m extends MY_Model {

	protected $table_name	= 'user';

	public function __construct() {
		parent::__construct();
	}

	function login($login, $pass) {
		$where = "(username = '$login' OR email = '$login') AND password = '$pass'";
		return $this->get_by($where, TRUE);
	}

}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */