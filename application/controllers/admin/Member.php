<?php  

defined('BASEPATH') OR exit ('No direct script access allowed');

class Member extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("member_model");
		$this->load->library('form_validation');
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index(){
		$data["members"] = $this->member_model->getAll();
		$this->load->view("admin/member/list", $data);
	}

	public function add(){
		$member = $this->member_model; //objek model
		$validation = $this->form_validation; //objek validation
		$validation->set_rules($member->rules()); //terapkan rules
		// $data["members"] = $this->member_model->getAll();

		if($validation->run()) { //melakukan validasi
			$member->save(); // simpan data ke database
			$this->session->set_flashdata('success', 'Berhasil disimpan'); //tampilkan pesan berhasil
		}

		$this->load->view("admin/member/new_form"); // tampilkan form add
	}

	public function edit($id = null){
		if(!isset($id)) redirect('admin/member');

		$member = $this->member_model; //object model
		$validation = $this->form_validation; //objek validation
		$validation->set_rules($member->rules()); // menerapkan rules

		if($validation->run()) { //melakukan validasi
			$member->update(); //menyimpan data
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$data["members"] = $member->getById($id); // mengambil data untuk ditampilkan pada form
		if(!$data["members"]) show_404(); // jika tidak ada data, tampilkan error 404

		$this->load->view("admin/member/edit_form", $data);
	}

	public function delete($id=null){
		if(!isset($id)) show_404();

		if ($this->member_model->delete($id)) {
			redirect(site_url('admin/member'));
		}
	}
}

?>