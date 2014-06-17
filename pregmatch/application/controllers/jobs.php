<?php
class jobs extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('job');
		//$this->load->library('table');
	}
	
	function getjobs(){
		$data['job'] = $this->job->get_jobs(100,$start=0);
		echo json_encode($data['job']);
	}
	
	
}