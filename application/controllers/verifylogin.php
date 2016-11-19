<?php

class VerifyLogin extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}


	function check_database($email, $password){
		$result = $this->user_model->login($email, $password);
		if($result){
			$sess_array=array();
			foreach($result as $r){
				$sess_array = array(
					'id_user'=> $r->id_user,
					'email'=> $r->email,
					'nama'=>$r->nama
					);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	function index(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if($this->check_database($email, $password)==FALSE){
			$this->load->view('login/login_view');
		}
		else{
			redirect('home','refresh');
		}


	}




}