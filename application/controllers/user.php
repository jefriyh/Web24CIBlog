<?php

class User extends CI_Controller{

function __construct(){
		parent::__construct();		
		$this->load->model('user_model');
       
   }

	function index(){
		$data['user'] = $this->user_model->user_view_all()->result();
		$this->load->view('user/user_list', $data);
	}

	function tambah(){
		$this->load->view('user/user_tambah');
	}
	function tambah_aksi(){
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$data = array('nama' => $nama,
			'email' => $email,
			'password' => $password);
		$this->user_model->tambah_data($data,'user');
		redirect('user/index');

	}

	function edit($id){
		$where = array('id_user' => $id);
		$data['user'] = $this->user_model->edit_data($where,'user')->result();
		$this->load->view('user/user_edit',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$data = array('nama' => $nama,
			'email' => $email,
			'password' => $password);

		$where = array('id_user' => $id);
		$this->user_model->update_data($where, $data,'user');
		redirect('user/index');

	}

	function hapus($id){
		$where = array('id_user'=>$id);
		$this->user_model->hapus_data($where, 'user');
		redirect('user/index');

	}

}