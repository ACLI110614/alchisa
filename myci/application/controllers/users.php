<?php
class Users extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		//$this->load->library('table');
	}
	
	function createuser($username,$password)
	{
		$data = array(
			"username"=>$username,
			"password"=>sha1($password)
		);
		$act = $this->user->create_user($data);
		if($act){
			echo "success";
		}	
	}
	
	function login(){
		$data['error'] = 0;
		if($_POST){
			//$this->load->model('user');
			$username = $this->input->post('username',true);
			$password =  $this->input->post('password',true);
			$type =  $this->input->post('user_type',true);
			$user=$this->user->login($username,$password,$type);
			if(!$user){
				$data['error'] = 1;
			}else{
				$this->session->set_userdata('userID',$user['userID']);
				$this->session->set_userdata('user_type',$user['user_type']);
				redirect(base_url().'posts');
			}
		}
		$this->load->view('header');
		$this->load->view('login',$data);
		$this->load->view('footer');

	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'posts');
	}
	
}