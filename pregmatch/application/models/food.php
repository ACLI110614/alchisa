<?php

class food extends CI_Model{
	
	function getFoods($num,$start){
		//select * from posts
		$sql='select * from foods ORDER BY name DESC limit '.$start.','.$num;
		$query=$this->db->query($sql);
		
		
		foreach ($query->result() as $row)
		{
			//echo $row->title;
			$myvar[] = array(
					"foodid" => $row->id,
					"name" => $row->name,
					"img"=>$row->imgsrc,
					"categoryid" => $row->categoryId,
					"gramperserving" => $row->gramperserving,
					"desc" => $row->description
			);
		}
		return $myvar;}
	
	function getFood($id){
		//select * from posts
		$sql='select * from foods where id = '.$id;
		$query=$this->db->query($sql);
		foreach ($query->result() as $row)
		{
			//echo $row->title;
			$myvar[] = array(
					"foodid" => $row->id,
					"name" => $row->name,
					"img"=>$row->imgsrc,
					"categoryid" => $row->categoryId,
					"gramperserving" => $row->gramperserving,
					"desc" => $row->description
			);
		}
		return $myvar;
	}

	
	function addfood($data){
		
		$this->db->insert('foods',$data);
		return $this->db->insert_id();
		
	}
}