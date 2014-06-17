<?php
class foods extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('food');
		$this->output->set_header("Access-Control-Allow-Origin: *");
		$this->output->set_header("Access-Control-Expose-Headers: Access-Control-Allow-Origin");
		$this->output->set_status_header(200);
		$this->output->set_content_type('application/json');
	}
	
	public function getfoods($start=0){
		$data = $this->food->getFoods(100,$start);
	
		print json_encode($data);
	}
	
	public function getfoodbyid(){
		$id = $_POST['id'];
		$data = $this->food->getFood($id);
		print json_encode($data);
	}
	
	public function addfood($data){
		if($_POST){
			$data = array(
					'categoryId'=>$_POST['catid'],
					'name'=>$_POST['name'],
					'description'=>$_POST['desc'],
					'gramperserving'=>$_POST['gram'],
					'imgsrc'=>$_POST['imgsrc']
				
			);
			$this->food->addfood($data);
			echo json_encode($data);
			//return $this->db->insert_id();
		
	}}
	
	
}