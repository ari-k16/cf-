<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Company_model extends CI_Model {

	private $_table = "company"; //nama table 

	// nama kolom di table, harus sama huruf besar dan kecilnya (casesensitif)
	public $id_company;
	public $visi;
	public $misi;
	public $umum; 

	public function rules(){
		return [
			// ['field' => 'id_company',
			// 'label' => 'Id_company',
			// 'rules' => 'required'],

			['field' => 'visi',
			'label' => 'Visi',
			'rules' => 'required'],

			['field' => 'misi',
			'label' => 'Misi',
			'rules' => 'required'],

			['field' => 'umum',
			'label' => 'Umum',
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
		return $this->db->get_where($this->_table,["id_company" => $id])->row();
		// ini sama artinya seperti :
		// SELECT * FROM company  WHERE id_company=$id
		// method ini akan mengembalikan sebuah objek 
	}

	public function save()
	{
		$post = $this->input->post(); // ambil data dari from 
		// $this->id_company = '';
		$this->visi = $post["visi"]; // isi field visi 
		$this->misi = $post["misi"]; // isi field misi 
		$this->umum = $post["umum"]; // isi field umum 
		return $this->db->insert($this->_table, $this); // simpan ke database
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_company = $post["id"];
		$this->visi 	  = $post["visi"];
		$this->misi 	  = $post["misi"];
		$this->umum 	  = $post["umum"];
		return $this->db->update($this->_table, $this, array('id_company' => $post['id']));
	}

	public function delete($id)
	{
		$this->db->delete($this->_table, array('id_company' => $id));
	}
}

?>