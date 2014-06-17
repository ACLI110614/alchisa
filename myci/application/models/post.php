<?php
class post extends CI_Model{
	
	function get_posts($num,$start){
		//select * from posts
		$sql='select * from posts where active=1 ORDER BY date_added DESC limit '.$start.','.$num;
		$query=$this->db->query($sql);
		
		
		foreach ($query->result() as $row)
		{
			//echo $row->title;
			$myvar[] = array(
					"postID" => $row->postID,
					"title" => $row->title,
					"post" => $row->post,
					"date" => $row->date_added
			);
		}
		
		return $myvar;
	}

	function get_posts_count(){
		$this->db->select('postID')->from('posts')->where('active',1);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function get_post($postID){
		$sql = 'select * from posts where postID='.$postID;
		$query= $this->db->query($sql);
		return $query->first_row('array');
		//$this->db->get()
	}
	
	function insert_post($data){
		$this->db->insert('posts',$data);
		return $this->db->insert_id();
		
	}
	
	function update_post($postID,$data){
		$this->db->where('postID',$postID);
		$this->db->update('posts',$data);
		
	}
	
	function delete_post($postID){
		$this->db->where('postID',$postID);
		$this->db->delete('posts');
	}
	
}
