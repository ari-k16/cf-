<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Contact_model extends CI_Model {

	private $_table = "contact"; //nama table 

	// nama kolom di table, harus sama huruf besar dan kecilnya (casesensitif)
	public $id_contact;
	public $nama;
	public $email;
	public $phone;
	public $isi; 

	public function rules(){
		return [

			['field' => 'nama',
			'label' => 'Nama',
			'rules' => 'required'],

			['field' => 'email',
			'label' => 'Email',
			'rules' => 'required'],

			['field' => 'phone',
			'label' => 'Phone',
			'rules' => 'required'],

			['field' => 'isi',
			'label' => 'Isi',
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
		return $this->db->get_where($this->_table,["id_contact" => $id])->row();
		// ini sama artinya seperti :
		// SELECT * FROM company  WHERE id_company=$id
		// method ini akan mengembalikan sebuah objek 
	}

	public function save()
	{
		$post = $this->input->post(); // ambil data dari form 
		// $this->id_contact = '';
		$this->nama = $post["nama"];   // isi field 
		$this->email = $post["email"]; // isi field  
		$this->phone = $post["phone"]; // isi field
		$this->isi 	 = $post["isi"];    // isi field 
		return $this->db->insert($this->_table, $this); // simpan ke database
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_contact = $post["id"];
		$this->nama 	  = $post["nama"];
		$this->email 	  = $post["email"];
		$this->phone 	  = $post["phone"];
		$this->isi 		  = $post["isi"];
		return $this->db->update($this->_table, $this, array('id_contact' => $post['id']));
	}

	public function delete($id)
	{
		$this->db->delete($this->_table, array("id_contact" => $id));
	}
}


?>