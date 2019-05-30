<?php
class Bbs_model extends CI_Model {

    public function __construct() {
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	//bbsテーブルから全データを取得
	public function get_bbs() {
		$query = $this->db->get('bbs_laravel');
		return $query->result(); // result()はオブジェクト形式で結果を取得している
	}							 						 // 連想配列で取得したい場合はresult_array()に変更する

	//bbsテーブルからid,name,bodyを取得
	public function get_select_bbs() {
		$this->db->select('id, name, body');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('bbs_laravel');
		return $query->result_array();
	}
	
	public function insert_bbs() {
		$this->db->trans_start();
		$this->name = $this->input->post('name', TRUE);
		$this->body = $this->input->post('body', TRUE);
		$this->db->insert('bbs_laravel', $this);
		$this->db->trans_complete();
		$this->db->trans_off();
	}
	
	public function update_bbs() {
		$this->name = $this->input->post('name', TRUE);
		$this->body = $this->input->post('body', TRUE);
		$this->date = time();
	}
		
}
