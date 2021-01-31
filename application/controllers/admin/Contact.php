<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("contact_model");
		$this->load->library('form_validation');
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index(){
		$data["contacts"] = $this->contact_model->getAll();
		$this->load->view("admin/contact/list", $data);
	}

	public function add(){
		$contact = $this->contact_model;
		$validation = $this->form_validation;
		$validation->set_rules($contact->rules());
		$data["contacts"] = $this->contact_model->getAll();

		if ($validation->run()) {
			$contact->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan'); // tampilkan pesan berhasi
		}

		$this->load->view("admin/contact/new_form");
	}

	public function edit($id = null){
		if (!isset($id)) redirect('admin/contact'); 
		
		$contact = $this->contact_model; //objek model
		$validation = $this->form_validation; //objek validation
		$validation->set_rules($contact->rules()); //menerapkan rules
		
		if($validation->run()){ // melakukan validasi
			$contact->update(); // menyimpan data
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$data["contacts"] = $contact->getById($id); //mengambil data untuk ditampilkan pada form
		if (!$data["contacts"]) show_404(); // jika tidak ada data, tampilkan error 404

		$this->load->view("admin/contact/edit_form", $data); //menampilkan edit
		
	}

	public function delete($id=null){
		if(!isset($id)) show_404();

		if($this->contact_model->delete($id)) {
			redirect(site_url('admin/contact'));
		}
	}
}


?>