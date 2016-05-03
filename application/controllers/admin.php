<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library(array('form_validation', 'pagination'));
		$this->load->model(array('products_m', 'news_m', 'testimonials_m'));
	}

	function index() {
		$config['base_url']		= site_url('admin/index');
		$config['total_rows']	= $this->products_m->count_all_products();
		$config['per_page']		= 6;
		$config['uri_segment']	= 3;
		$this->pagination->initialize($config);

		$data['meta_title']			= 'Products - Admin Panel';
		$content['header']			= $this->load->view('admin/header', $data, TRUE);
		$content['sidebar']			= $this->load->view('admin/sidebar', NULL, TRUE);
		$content['footer']			= $this->load->view('admin/footer', NULL, TRUE);
		$content['products_list']	= $this->products_m->get_all_products($config['per_page'], $this->uri->segment(3));
		$this->load->view('admin/products', $content);
	}

	function products_add() {
		$data['meta_title']	= 'Add Product - Admin Panel';
		$content['header']	= $this->load->view('admin/header', $data, TRUE);
		$content['sidebar']			= $this->load->view('admin/sidebar', NULL, TRUE);
		$content['footer']	= $this->load->view('admin/footer', NULL, TRUE);
		$this->load->view('admin/products_add', $content);
	}

	function product_post() {
		$this->form_validation->set_rules('name', 'Product Name', 'trim|required');
		$this->form_validation->set_rules('description', 'Product Description', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|is_natural|required');

		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/products_add');
		} else {
			$config['upload_path']		= './assets/products/';
			$config['allowed_types']	= 'gif|jpg|png';
			$config['max_size']			= '1024';
			$config['max_width']		= '1024';
			$config['max_height']		= '1024';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('image')) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('admin/products_add');
			} else {
				$image	= $this->upload->data();
				$data 	= array(
					'name'			=> $this->input->post('name'),
					'description'	=> $this->input->post('description'),
					'price'			=> $this->input->post('price'),
					'image'			=> $image['file_name'],
					'imagepath'		=> $image['file_path']
				);
				$this->products_m->insert_product($data);
				$this->session->set_flashdata('success', 'Item added successfully.');
				redirect('admin');
			}
		}
	}

	function product_edit($id) {
		$data['meta_title']	= 'Edit Product - Admin Panel';
		$content['header']	= $this->load->view('admin/header', $data, TRUE);
		$content['sidebar']			= $this->load->view('admin/sidebar', NULL, TRUE);
		$content['footer']	= $this->load->view('admin/footer', NULL, TRUE);
		$content['product']	= $this->products_m->get_products($id);
		$this->load->view('admin/product_edit', $content);
	}

	function product_edit_post() {
		$this->form_validation->set_rules('name', 'Product Name', 'trim|required');
		$this->form_validation->set_rules('description', 'Product Description', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|is_natural|required');
		$id	= $this->input->post('id');

		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/product_edit/' . $id);
		} else {
			$config['upload_path']		= './assets/products/';
			$config['allowed_types']	= 'gif|jpg|png';
			$config['max_size']			= '1024';
			$config['max_width']		= '1024';
			$config['max_height']		= '1024';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('image')) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('admin/product_edit/' . $id);
			} else {
				$new_img	= $this->upload->data();
				$prev_img	= $this->products_m->get_products($id)->imagepath . $this->products_m->get_products($id)->image;
				$data 		= array(
					'name'			=> $this->input->post('name'),
					'description'	=> $this->input->post('description'),
					'price'			=> $this->input->post('price'),
					'image'			=> $new_img['file_name'],
					'imagepath'		=> $new_img['file_path']
				);
				unlink($prev_img);
				$this->products_m->update_product($data, $id);
				$this->session->set_flashdata('success', 'Item updated successfully.');
				redirect('admin');
			}
		}
	}

	function product_delete($id) {
		$image		= $this->products_m->get_products($id)->imagepath . $this->products_m->get_products($id)->image;
		unlink($image);
		$this->products_m->delete_product($id);
		$this->session->set_flashdata('success', 'Item deleted successfully.');
		redirect('admin');
	}

	function news() {
		$config['base_url']		= site_url('admin/news');
		$config['total_rows']	= $this->news_m->count_total_news();
		$config['per_page']		= 7;
		$config['uri_segment']	= 3;
		$this->pagination->initialize($config);
		
		$data['meta_title']		= 'News - Admin Panel';
		$content['header']		= $this->load->view('admin/header', $data, TRUE);
		$content['sidebar']			= $this->load->view('admin/sidebar', NULL, TRUE);
		$content['footer']		= $this->load->view('admin/footer', NULL, TRUE);
		$content['news_list']	= $this->news_m->get_all_news($config['per_page'], $this->uri->segment(3));
		$this->load->view('admin/news', $content);
	}

	function news_details($id) {
		$data['meta_title']			= 'News Details - Admin Panel';
		$content['header']			= $this->load->view('admin/header', $data, TRUE);
		$content['sidebar']			= $this->load->view('admin/sidebar', NULL, TRUE);
		$content['footer']			= $this->load->view('admin/footer', NULL, TRUE);
		$content['news_content']	= $this->news_m->get_news($id);
		$this->load->view('admin/news_details', $content);
	}

	function news_add() {
		$data['meta_title']	= 'Post New - Admin Panel';
		$content['header']	= $this->load->view('admin/header', $data, TRUE);
		$content['sidebar']			= $this->load->view('admin/sidebar', NULL, TRUE);
		$content['footer']	= $this->load->view('admin/footer', NULL, TRUE);
		$this->load->view('admin/news_add', $content);
	}

	function news_post() {
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');

		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/news_add');
		} else {
			$data = array(
				'title'		=> $this->input->post('title'),
				'content'	=> $this->input->post('content')
			);
			$this->news_m->insert_news($data);
			$this->session->set_flashdata('success', 'Item added successfully.');
			redirect('admin/news');
		}
	}

	function news_edit($id) {
		$data['meta_title']			= 'Edit News - Admin Panel';
		$content['header']			= $this->load->view('admin/header', $data, TRUE);
		$content['sidebar']			= $this->load->view('admin/sidebar', NULL, TRUE);
		$content['footer']			= $this->load->view('admin/footer', NULL, TRUE);
		$content['news_content']	= $this->news_m->get_news($id);
		$this->load->view('admin/news_edit', $content);
	}

	function news_edit_post() {
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
		$id = $this->input->post('id');

		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/news_edit/' . $id);
		} else {
			$data = array(
				'title'		=> $this->input->post('title'),
				'content'	=> $this->input->post('content')
			);
			$this->news_m->update_news($data, $id);
			$this->session->set_flashdata('success', 'Item updated successfully.');
			redirect('admin/news');
		}
	}

	function news_delete($id) {
		$this->news_m->delete_news($id);
		$this->session->set_flashdata('success', 'Item deleted successfully.');
		redirect('admin/news');
	}

	function testimonials() {
		$config['base_url']		= site_url('admin/testimonials');
		$config['total_rows']	= $this->testimonials_m->count_total_testimonials();
		$config['per_page']		= 5;
		$config['uri_segment']	= 3;
		$this->pagination->initialize($config);

		$data['meta_title']		= 'Testimonials - Admin Panel';
		$content['header']		= $this->load->view('admin/header', $data, TRUE);
		$content['sidebar']		= $this->load->view('admin/sidebar', NULL, TRUE);
		$content['footer']		= $this->load->view('admin/footer', NULL, TRUE);
		$content['testi_list']	= $this->testimonials_m->get_all_testimonials($config['per_page'], $this->uri->segment(3));
		$this->load->view('admin/testimonials', $content);
	}

	function testimonials_delete($id) {
		$this->testimonials_m->delete_testimonials($id);
		$this->session->set_flashdata('success', 'Item deleted successfully.');
		redirect('admin/testimonials');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */