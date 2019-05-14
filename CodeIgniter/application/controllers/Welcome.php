<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->library("pagination");
		$this->load->library("table");
		$template['table_open'] = '<table class="table table-hover">';
		$this->table->set_heading("ID","名前","本文");
		$this->table->set_template($template);
		$data['rows'] = $this->pagination();
		$this->load->helper('form');
		$this->load->view('index', $data);
	}

	public function pagination()
	{
		$this->load->library("pagination");
		$config["base_url"] = 'http://localhost/CodeIgniter/index.php/welcome/index';
		$config["total_rows"] = $this->db->get("bbs_laravel")->num_rows();
		$config["per_page"] = 5;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$this->db->select('id, name, body');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get("bbs_laravel", $config["per_page"], $this->uri->segment(3));
		return $query->result_array();
	}
	
	public function send()
	{
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$config = array(
				array(
					 'field' => 'body',
					 'label' => '本文',
					 'rules' => 'trim|required',
					 'errors' => array(
						'required' => '%s は必須です。',
					)
				)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->helper('url');
			$this->index();
		}else
		{
			$this->load->model('Bbs_model');
			$data = $this->Bbs_model->insert_bbs();
			// $this->load->helper('url');
			$this->load->helper('url');
			redirect('/');
		}
	}	
}
