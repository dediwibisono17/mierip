<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_m extends MY_Model {

	protected $table_name = 'products';

	public function __construct() {
		parent::__construct();
	}

	function count_all_products() {
		return $this->db->count_all($this->table_name);
	}

	function get_all_products($limit = NULL, $offset = NULL) {
		if($limit != NULL || $offset != NULL) {
			return $this->db->get($this->table_name, $limit, $offset);
		} else {
			return $this->get();
		}
	}

	function get_products($id) {
		return $this->get($id);
	}

	function insert_product($data) {
		return $this->save($data);
	}

	function update_product($data, $id) {
		$this->save($data, $id);
	}

	function delete_product($id) {
		$this->delete($id);
	}

}

/* End of file products_m.php */
/* Location: ./application/models/products_m.php */