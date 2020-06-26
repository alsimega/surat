<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function suratmasuk(){
		$table=$this->mod->getwhere("view_surat",array('id_penerima'=>$_SESSION['id_user']))->result_array();
		$data=array(
				'table'=>$table
			);
		/*echo "<pre>";
		print_r($data);
		echo "</pre>";*/
		$this->load->view('suratmasuk',$data);
	}

	public function getsurat($id){
		$table=$this->mod->getwhere('view_surat',array('id_surat'=>$id))->result_array();
		$x=date_create($table['0']['tanggal']);
        $table['0']['tanggal']=date_format($x,"d-m-Y");
		$data=json_encode($table['0']);
		echo $data;
	}

	public function delsurat($id){
		$this->mod->delete("tb_surat",array('id_surat' => $id));
		redirect(base_url("user/suratkeluar"));
	}

	public function suratkeluar(){
		$table=$this->mod->getwhere("view_surat",array('id_pengirim'=>$_SESSION['id_user']))->result_array();
		$user=$this->mod->get('tb_user')->result_array();
			$i=0;
			foreach ($user as $u) {
				if ($u['id_user']==$_SESSION['id_user']) {
					unset($user[$i]);
				}
				$i++;
			}

		$data=array(
				'table'=>$table,
				'user'=>$user
			);

		$this->load->view('suratkeluar',$data);
	}

	public function kirimsurat(){

		if($_POST != NULL ){
			$data = array();
			$countfiles = count($_FILES['lampiran']['name']);
			for($i=0;$i<$countfiles;$i++){
				if(!empty($_FILES['lampiran']['name'][$i])){
					echo $i;
					$_FILES['file']['name'] = $_FILES['lampiran']['name'][$i];
          			$_FILES['file']['type'] = $_FILES['lampiran']['type'][$i];
          			$_FILES['file']['tmp_name'] = $_FILES['lampiran']['tmp_name'][$i];
          			$_FILES['file']['error'] = $_FILES['lampiran']['error'][$i];
          			$_FILES['file']['size'] = $_FILES['lampiran']['size'][$i];

          			$config['upload_path'] = '.\assets\uploads'; 
          			$config['allowed_types'] = 'jpg|jpeg|png|gif|docx|doc|pdf|xlsx|zip|rar';
          			//$config['max_size'] = '5000'; // max_size in kb
          			$config['file_name'] = $_FILES['lampiran']['name'][$i];
          			
          			$k[]=$config;
          			$f[]=$_FILES['file'];

          			$this->load->library('upload',$config);
          			$this->upload->initialize($config);

          			if($this->upload->do_upload('file')){
          				$uploadData = $this->upload->data();
          				echo "<pre>";
          				print_r($uploadData);
          				echo "</pre>";
            			$filename = $uploadData['file_name'];
            			$data[] = $filename;
            			$err[]=$i;
          			}else{
          				$err[] = array('error' => $this->upload->display_errors());
          			}
				}
			}
		
		$data=json_encode($data);
		$_POST['pengirim']=$_SESSION['id_user'];
		$_POST['lampiran']=$data;

		$x=date_create($_POST['tanggal']);
		$y=date_format($x,"Y-m-d");
		$_POST['tanggal']=$y;

		$this->mod->insert('tb_surat',$_POST);
/*		
		echo "<pre>";
		print_r($countfiles);
		echo "<hr>";
		print_r($_POST);
		echo "<hr>";
		print_r($_FILES);
		echo "<hr>";
		print_r($k);
		echo "<hr>";
		print_r($f);
		echo "<hr>";
		print_r($err);
		echo "<hr>";
		print_r(json_decode($data));
		echo "</pre>";
*/
			redirect(base_url('user/suratkeluar'));
		}else{
			redirect(base_url('user/suratkeluar'));
		}

	}

	public function logout(){
		session_destroy();
		redirect();
	}

	public function tes(){
		$table=$this->mod->get('view_surat')->result_array();
		foreach ($table as $t) {
			echo $t['tanggal'];
			
			//output
			$x=date_create($t['tanggal']);
			$y=date_format($x,"d-m-Y");
			echo " => ".$y;

			//input
			$x=date_create($y);
			$y=date_format($x,"Y-m-d");
			echo " => ".$y;
			
			echo "<hr>";
		}
	}

//END
}
