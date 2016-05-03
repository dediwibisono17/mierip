<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_m extends MY_Model {

	protected $table_name	= 'news';

	public function __construct() {
		parent::__construct();
	}

	function count_total_news() {
		return $this->db->count_all($this->table_name);
	}

	function get_all_news($limit = NULL, $offset = NULL) {
		$this->db->order_by('id', 'desc');
		if($limit != NULL || $offset != NULL) {
			return $this->db->get($this->table_name, $limit, $offset);
		} else {
			return $this->get();
		}
	}

	function get_news($id) {
		return $this->get($id);
	}

	function insert_news($data) {
		return $this->save($data);
	}

	function update_news($data, $id) {
		$this->save($data, $id);
	}

	function delete_news($id) {
		$this->delete($id);
	}

}

/* End of file news_m.php */
/* Location: ./application/models/news_m.php */