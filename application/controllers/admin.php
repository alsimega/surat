<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login" && $_SESSION['level']=="1"){
			redirect(base_url());
		}
	}

	public function user(){
		$table=$this->mod->get("tb_user")->result_array();
		$data=array(
			"table"=>$table
		);
		$this->load->view("user",$data);
	}

	public function adduser(){
		$_POST['password']=md5($_POST['password']);
		$this->mod->insert("tb_user",$_POST);
		redirect(base_url("admin/user"));
	}

	public function getuser($id){
		$table=$this->mod->getwhere('tb_user',array('id_user'=>$id))->result_array();
		$data=json_encode($table['0']);
		echo $data;
	}

	public function deluser($id){
		$this->mod->delete("tb_user",array('id_user' => $id));
		redirect(base_url("admin/user"));
	}

	public function edituser(){
		if (empty($_POST['password'])) {
			unset($_POST['password']);
		}else{
			$_POST['password']=md5($_POST['password']);
		}
		$this->mod->update("tb_user",$_POST,array('id_user'=>$_POST['id_user']));
		redirect(base_url("admin/user"));
	}

}