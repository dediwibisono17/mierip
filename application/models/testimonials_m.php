<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonials_m extends MY_Model {

	protected $table_name	= 'testimonials';

	public function __construct() {
		parent::__construct();
	}

	function count_total_testimonials() {
		$this->db->count_all($this->table_name);
	}

	function get_all_testimonials($limit, $offset) {
		$this->db->order_by('id', 'desc');
		if($limit != NULL || $offset != NULL) {
			return $this->db->get($this->table_name, $limit, $offset);
		} else {
			return $this->get();
		}
	}

	function insert_testimonials($data) {
		return $this->save($data);
	}

	function delete_testimonials($id) {
		$this->delete($id);
	}

}

/* End of file testimonials_m.php */
/* Location: ./application/models/testimonials_m.php */