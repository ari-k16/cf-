<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class User_model extends CI_Model {

	private $_table = "user"; //nama table 

	// nama kolom di table, harus sama huruf besar dan kecilnya (casesensitif)
	public $id_user;
	public $nama_user;
	public $email_user;
	public $username;
	public $password; 

	public function rules(){
		return [

			['field' => 'nama_user',
			'label' => 'Nama_user',
			'rules' => 'required'],

			['field' => 'email_user',
			'label' => 'Email_user',
			'rules' => 'required'],

			['field' => 'username',
			'label' => 'Username',
			'rules' => 'required'],

			['field' => 'password',
			'label' => 'Password',
			'rules' => 'required']
		];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
		// ini sama artinya seperti :
		// SELECT * FROM company 
		// method ini akan mengembalikan sebuah array 
		//  yang berisi objek dari row 
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table,["id_user" => $id])->row();
		// ini sama artinya seperti :
		// SELECT * FROM company  WHERE id_company=$id
		// method ini akan mengembalikan sebuah objek 
	}

	public function save()
	{
		$post = $this->input->post(); // ambil data dari from 
		// $this->id_user = '';
		$this->nama_user 	 = $post["nama_user"];   // isi field 
		$this->email_user	 = $post["email_user"]; // isi field  
		$this->username 	 = $post["username"]; // isi field
		$this->password 	 = password_hash($post["password"], PASSWORD_DEFAULT);    // isi field 
		return $this->db->insert($this->_table, $this); // simpan ke database
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_user    		= $post["id"];
		$this->nama_user  		= $post["nama_user"];
		$this->email_user    	= $post["email_user"];
		$this->username 	  	= $post["username"];
		$this->password 		= password_hash($post["password"], PASSWORD_DEFAULT);
		return $this->db->update($this->_table, $this, array('id_user' => $post['id']));
	}

	public function delete($id)
	{
		$this->db->delete($this->_table, array('id_user' => $id));
	}

	 public function doLogin(){
	 	$post = $this->input->post();

	 	// cari user berdasarkan email dan username
	 	$this->db->where('username', $post["username"])
	 				->or_where('email_user', $post["username"]);
	 	$user = $this->db->get($this->_table)->row();

			 	
	 

	 // jika user terdaftar 
	 if ($user) {
	 	// periksa passwordnya 
	 	$isPasswordTrue = password_verify($post["password"], $user->password);
	 	// periksa role-nya
	 	$isAdmin = $user->role == "admin";

	 	// var_dump($isPasswordTrue,$isAdmin);
	 	// die;

	 	// jika password benar dan dia admin
	 	if($isPasswordTrue && $isAdmin){
	 		// login sukses
	 		$this->session->set_userdata(['user_logged' => $user]);
	 		// $this->_updateLastLogin($user->id_user);
	 		return true;
	 		echo '<div alert alert-success>Berhasil Login</div>';

	 	}
	 }
	 // login gagal 
	 return false;
	}

	public function isNotLogin(){
		return $this->session->userdata('user_logged') === null;
	}
}

?>