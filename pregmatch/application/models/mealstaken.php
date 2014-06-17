<?php
class mealstaken extends CI_Model{
	
	function getmealstaken(){
		$sql='select * from mealstaken';
		$query=$this->db->query($sql);
		foreach ($query->result() as $row)
		{
			//echo $row->title;
			$data[] = array(
					"id" => $row->id,
					"userid" => $row->userid,
					"datetook" => $row->datetook,
					"mealskedid" => $row->mealskedid,
					"foodid" => $row->foodid
			);
		}
		
		return $data;
	}
	
	function getmealstakenbyuser(){
		
	
	}
	
	function getmealstakenbydate(){
		
	
	}
	
	function addtakemeals($data){
	
		$this->db->insert('mealstaken',$data);
		return $this->db->insert_id();
	
	}
	
}