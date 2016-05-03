<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $table_name		= '';
	protected $primary_key		= 'id';
	protected $primary_filter	= 'intval';

	public function __construct() {
		parent::__construct();
	}

	// List all items
	function get($id = NULL, $single = FALSE) {
		
		if ($id != NULL) {
			$filter = $this->primary_filter;
			$id		= $filter($id);
			$method = 'row';
			$this->db->where($this->primary_key, $id);
		} elseif ($single == TRUE) {
			$method	= 'row';
		} else {
			$method	= 'result';
		}

		return $this->db->get($this->table_name)->$method();
	}

	// List some items
	function get_by($where, $single = FALSE) {
		$this->db->where($where);
		return $this->get(NULL, $single);
	}

	// Insert or update item
	function save($data, $id = NULL) {
		// Insert
		if ($id == NULL) {
			$this->db->set($data);
			$this->db->insert($this->table_name);
			$id	= $this->db->insert_id();
		}

		// Update
		else {
			$filter	= $this->primary_filter;
			$id		= $filter($id);
			$this->db->set($data);
			$this->db->where($this->primary_key, $id);
			$this->db->update($this->table_name);
		}

		return $id;
	}

	function delete($id) {
		$filter	= $this->primary_filter;
		$id		= $filter($id);
		
		if ( ! $id) {
			return FALSE;
		}

		$this->db->where($this->primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->table_name);
	}

}

/* End of file MY_Model.php */
/* Location: ./application/models/MY_Model.php */