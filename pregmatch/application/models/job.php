<?php
class job extends CI_Model{
	
	function get_jobs($num,$start){
		//select * from posts
		$sql='select * from job ORDER BY postdate DESC limit '.$start.','.$num;
		$query=$this->db->query($sql);
	
	
		foreach ($query->result() as $row)
		{
			//echo $row->title;
			$myvar[] = array(
					"ID" => $row->id,
					"title" => $row->title,
					"description" => $row->description,
					"requirements" => $row->requirements,
					"postdate" => $row->postdate
					
			);
		}
	
		//echo json_encode($myvar);
		return $myvar;
	}
	
}