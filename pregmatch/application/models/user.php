<?php
class User extends CI_Model{
	
	function create_user($data){
		$this->db->insert('users',$data);
	}
	
	function login($username,$passoword,$type){
		$where=array(
			'username'=>$username,
			'password'=>sha1($passoword),
			'user_type'=>$type
		);
		
		$this->db->select()->from('users')->where($where);
		$query = $this->db->get();
		return $query->first_row('array');
	}
	
	function adduser($data){
		$this->db->insert('userstable',$data);
	}
	
	function getUsers(){
		//$userdata = $this->db->select()->from('users');
		$sql='select * from userstable';
		$query=$this->db->query($sql);
		
		
		foreach ($query->result() as $row)
		{
			//echo $row->title;
			$userdata[] = array(
					"uid" => $row->id,
					"lastmens" => $row->lastmens,
					"uname" => $row->username,
					"delivery" => $row->deliverydate,
					"akey" => $row->accesskey
			);
		}
		
		return $userdata;
	}
	
	function delete_user($userid){
		$this->db->where('id',$userid);
		$this->db->delete('userstable');
	}
	
	
	
	
}