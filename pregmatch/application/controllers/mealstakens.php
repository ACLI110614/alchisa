<?php
class mealstakens extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mealstaken');
		//$this->load->library('table');
	}
	
	function getmealstaken(){
	$meals = $this->mealstaken->getmealstaken();
	$this->output->set_header("Access-Control-Allow-Origin: *");
	$this->output->set_header("Access-Control-Expose-Headers: Access-Control-Allow-Origin");
	$this->output->set_status_header(200);
	$this->output->set_content_type('application/json');
	echo json_encode($meals);
	}
	
	function addmeals(){
		$this->output->set_header("Access-Control-Allow-Origin: *");
		$this->output->set_header("Access-Control-Expose-Headers: Access-Control-Allow-Origin");
		$this->output->set_status_header(200);
		$this->output->set_content_type('application/json');
		if($_POST){
			$data = array(
					'userid'=>$_POST['uid'],
					'datetook'=>$_POST['datetook'],
					'ngdate'=>$_POST['ngdate'],
					'mealskedid'=>$_POST['mealskedid'],
					'foodid'=>$_POST['foodid']
			);
			$this->mealstaken->addtakemeals($data);
			
			echo json_encode($data);
	
		}else{
			echo json_encode("error");
		}
	}
	
}