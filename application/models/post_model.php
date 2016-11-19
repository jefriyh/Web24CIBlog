<?php

class Post_model extends CI_Model{

	function post_view_all(){
		return $this->db->get("post");
	}

	function post_view_user($id){
		$this->db->where('id_user', $id);
		return $this->db->get('post');
	}

	function tambah_data($data, $table){
		$this->db->insert($table, $data);
	}

	function update_data($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function edit_data($where, $table){
		return $this->db->get_where($table, $where);
	}

	function hapus_data($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}



}