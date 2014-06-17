<?php
class mealsskeds extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mealssked');
		$this->output->set_header("Access-Control-Allow-Origin: *");
		$this->output->set_header("Access-Control-Expose-Headers: Access-Control-Allow-Origin");
		$this->output->set_status_header(200);
		$this->output->set_content_type('application/json');
		//$this->load->library('table');
	}
	
	function getMeals(){
		$data = $this->mealssked->getMealsked();
		
		echo json_encode($data);
	}
}