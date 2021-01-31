<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Company extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("company_model");
		$this->load->library('form_validation');
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index(){
		$data["companys"] = $this->company_model->getAll();
		$this->load->view("admin/company/list", $data);
	}

	public function add(){
		$company = $this->company_model;
		$validation = $this->form_validation;
		$validation->set_rules($company->rules());
		$data["companys"] = $this->company_model->getAll();

		if ($validation->run()) {
			$company->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$this->load->view("admin/company/new_form", $data);
	}

	public function edit($id = null){
		if (!isset($id)) redirect('admin/company');

		$company = $this->company_model; //objek model
		$validation = $this->form_validation; //objek validation
		$validation->set_rules($company->rules()); // menerapkan rules

		if($validation->run()) { //melakukan validasi 
			$company->update(); // menyimpan data 
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		} 

		$data["company"] = $company->getById($id); // mengambil data untuk ditampilkan pada form 
		if (!$data["company"]) show_404(); // jika tidak ada data, tampilkan error 404

		$this->load->view("admin/company/edit_form", $data); // menampilkan edit 
	}

	public function delete($id=null){
		if(!isset($id)) show_404();

		if($this->company_model->delete($id)){
			redirect(site_url('admin/company'));
		}
	}
}


?>