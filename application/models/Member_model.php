<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Member_model extends CI_model {

	private $_table = "member"; //nama table 

	// nama kolom di table, harus sama huruf besar dan kecilnya (CaseSensitif)
	public $id_member;
	public $nama_member;
	public $photo = "user_no_image.jpg";
	public $deskripsi;

	public function rules(){
		return [

			['field' => 'nama_member',
			'label' => 'Nama_member',
			'rules' => 'required'],

			// ['field' => 'photo',
			// 'label' => 'Photo',
			// 'rules' => 'required'],

			['field' => 'deskripsi',
			'label' => 'Deskripsi',
			'rules' => 'required']
		];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
		// ini sama artinya seperti : 
		// SELECT * FROM member 
		// method ini akan mengembalikan sebuah array 
		// yang berisi objek dari row 
	}

	public function getById($id){
		return $this->db->get_where($this->_table,["id_member" => $id])->row();
		// ini sama artinya seperti :
		// SELECT * FROM member WHERE id_member=$id
		// method ini akan mengembalikan sebuah objek
	}

	public function save()
	{
		$post =$this->input->post(); // ambil data dari form 
		$this->nama_member = $post["nama_member"]; // isi field 
		$this->photo 	    = $this->_uploadPhoto(); // isi field 
		$this->deskripsi    = $post["deskripsi"]; // isi field 
		return $this->db->insert($this->_table,$this); //simpan ke database

	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_member 	= $post["id"];
		$this->nama_member 	= $post["nama_member"];
		$this->deskripsi 	= $post["deskripsi"];

		if (!empty($_FILES['photo']['name'])) {
			$this->photo = $this->_uploadPhoto();
		}else{
			$this->photo = $post["old_image"];
		}

		return $this->db->update($this->_table, $this, array('id_member' => $post['id']));
	}

	public function delete($id)
	{
		$this->db->delete($this->_table, array("id_member" => $id));
	}

	private function _uploadPhoto(){
		$config['upload_path'] 	    = './upload/member/';
		$config['allowed_types']    = 'gif|jpg|png';
		$config['file_name']        = $this->nama_member;
		$config['overwrite']		= true;
		$config['max_size'] 		= 1024;
		// $config['max_width']		= 1024;
		// $config['max_heigth']       = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('photo')) {
		 	return $this->upload->data("file_name");
		 } 

		 print_r($this->upload->display_errors());
		 // return "user_no_image.jpg";
	}

	private function _deletePhoto($id){
		$member = $this->getById($id);
		if ($member->photo != "user_no_image.jpg") {
			$filename = explode(".", $user->image)[0];
			return array_map('unlink', glob(FCPATH."upload/member/$filename.*"));
		}
	}


}

?>