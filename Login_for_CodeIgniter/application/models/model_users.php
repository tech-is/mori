<?php
class Model_users extends CI_Model{
	public function add_temp_users($key){
		//add_temp_usersのモデルの実行時に、以下のデータを取得して、$dataと紐づける
		$data=array(
			"name" => $this->input->post("name"),
			"kana" => $this->input->post("kana"),
			"tel" => $this->input->post("tel"),
			"mail" => $this->input->post("mail"),
			"year" => $this->input->post("year"),
			"sex" => $this->input->post("sex"),
			"magazine" => $this->input->post("magazine"),
			"pass_tmp"=>$key
		);
		//$dataをDB内のtemp_usersに挿入↓後に、$queryと紐づける
		$query=$this->db->insert("member", $data);
		if($query){		//データ取得が成功したらTrue、失敗したらFalseを返す
			return true;
		}else{
			return false;
		}
	}

	public function is_valid_key($key){
		$this->db->where("pass_tmp", $key);	
		$query = $this->db->get("member");
		if($query->num_rows() == 1){
			return true;
		}else return false;
	}

	public function register_user(){
		$pass = password_hash($this->input->post("pass"), PASSWORD_DEFAULT);
		$this->db->set("password", $pass);
		$this->db->where("pass_tmp", $this->input->post("key"));
		$this->db->update("member");
		return true;
	}
}
