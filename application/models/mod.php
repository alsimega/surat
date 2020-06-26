<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mod extends CI_Model {

	public function getWhere($table,$where){
		$data=$this->db->get_where($table,$where);
		return $data;
	} 

	public function get($table){
		$data=$this->db->get($table);
		return $data;
	}

	public function insert($table,$data){
		$this->db->insert($table,$data);
	}

	public function delete($table,$where){
		$this->db->delete($table,$where);
	}

	public function update($table,$data,$where){
		$this->db->update($table,$data,$where);
	}
}
