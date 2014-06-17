<?php
class mealssked extends CI_Model{
	
	function getMealsked(){
		
		$sql='select * from skedmeal ';
		$query=$this->db->query($sql);
		
		
		foreach ($query->result() as $row)
		{
			//echo $row->title;
			$data[] = array(
					"id" => $row->id,
					"mealname" => $row->name,
					"time" => $row->time
			);
		}
		
		return $data;
		
	}
	
	
}