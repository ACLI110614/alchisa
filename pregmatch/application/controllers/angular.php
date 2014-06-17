<?php

class angular extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('post');
		//$this->load->library('table');
	}
	
        public function index(){
            $this->load->view('main/layout/header');
            $this->load->view('angular/index');
            $this->load->view('main/layout/footer');
        }
        
        public function usemodule(){
            $this->load->view('main/layout/header');
            $this->load->view('angular/module');
            $this->load->view('main/layout/footer');
        }
        
        public function getpost(){
            $data['post'] = $this->post->get_posts(500,0);
	    echo json_encode($data['post']); 
            //$this->load->view('index_post',$data);
            
        }
        
        }
