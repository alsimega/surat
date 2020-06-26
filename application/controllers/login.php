<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') == "login"){
			redirect(base_url());
		}
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function doLogin(){
		$_POST['password']=md5($_POST['password']);
		$data = $this->mod->getWhere('tb_user',$_POST)->result_array();
		$cek = count($data);
		if($cek>0){

			$data_session = array(
				'username'=>$data['0']['username'],
				'id_user'=>$data['0']['id_user'],
				'level'=>$data['0']['level'],
				'status'=>'login'
			);
			$this->session->set_userdata($data_session);

			redirect(base_url());
		}else{
			$this->session->set_flashdata('err','Username dan/atau Password salah!');
			redirect(base_url('login'));
		}

	}

//END
}
