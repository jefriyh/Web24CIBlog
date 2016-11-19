<?php

class Post extends CI_Controller{

public $id_user ='';

function __construct(){
	parent::__construct();
	$this->load->model('post_model');

	if($this->session->userdata('logged_in')){
		$session_data = $this->session->userdata('logged_in');
		$this->id_user = $session_data['id_user'];
	}
	else{
		redirect('login', 'refresh');
	}
}

function index(){
	$data['post'] = $this->post_model->post_view_user($this->id_user)->result();
	$this->load->view('post/post_list', $data);
}

function tambah(){
		$this->load->view('post/post_tambah');
	}
function tambah_aksi(){
		$judul = $this->input->post('judul');
		$konten = $this->input->post('konten');
		$tgl_post = $this->input->post('tgl_post');
		$id_user = $this->id_user;
		$data = array('judul' => $judul,
			'konten' => $konten,
			'tgl_post' => $tgl_post,
			'id_user' => $id_user
			);
		$this->post_model->tambah_data($data,'post');
		redirect('post');
	}



	function edit($id){
		$where = array('id_post' => $id);
		$data['post'] = $this->post_model->edit_data($where,'post')->result();
		$this->load->view('post/post_edit',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$judul = $this->input->post('judul');
		$konten = $this->input->post('email');
		$tgl_post = $this->input->post('tgl_post');

		$data = array('judul' => $judul,
			'konten' => $konten,
			'tgl_post' => $tgl_post);

		$where = array('id_post' => $id);
		$this->post_model->update_data($where, $data,'post');
		redirect('post');
	}

	function hapus($id){
		$where = array('id_post'=>$id);
		$this->post_model->hapus_data($where, 'post');
		redirect('post');
	}









}