<?php

class posts extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('post');
		//$this->load->library('table');
	}
	
	function correct_permission($req){
		$user_type= $this->session->userdata('user_type');
		
		if($req == 'user'){
			if($user_type == 'user'){
				return true;
			}
		}elseif ($req=='author'){
			if($user_type == 'admin' || $user_type =='author'){
				return true;
			}
			
		}elseif($req == 'admin'){
			if($user_type == 'admin'){
				return true;
			}
		}
	}
	
	
	function index($start=0){
		$data['post'] = $this->post->get_posts(2,$start);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'posts/index';
		$config['total_rows'] = $this->post->get_posts_count();
		$config['per_page'] = 2;
		$this->pagination->initialize($config);
		$data['pages']=$this->pagination->create_links();
		//echo '<pre>';print_r($data['post']);echo '</pre>';
		$this->load->view('index_post',$data);
	}
	
	function post($postID){
		$data['post'] = $this->post->get_post($postID);
		$this->load->view('post',$data);
	}
	
	function new_post(){
		if($_POST){
		$data = array(
			'title'=>$_POST['title'],
			'post'=>$_POST['post'],
			'active'=>1
		);
		$this->post->insert_post($data);
		redirect(base_url().'posts/');
	}
	else{
		$this->load->view('new_post');
	}
	}
	
	function editpost($postID){
		if(!$this->correct_permission('author')){
			redirect(base_url().'users/login');
		}
		$data['success'] = 0;
		if($_POST){
		$data_post = array(
				'title'=>$_POST['title'],
				'post'=>$_POST['post'],
				'active'=>1
		);
		$this->post->update_post($postID,$data_post);
		$data['success'] =1;
		}
		$data['post']= $this->post->get_post($postID);
		$this->load->view('edit_post',$data);
	}
	
	function deletepost($postID){
		$this->post->delete_post($postID);
		redirect(base_url().'posts');
	}
}

?>