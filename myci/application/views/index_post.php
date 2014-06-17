<?php
if($this->session->userdata('userID')){
	echo "you are login !!! as ".$this->session->userdata('user_type')."<br>";
	echo "<a href='".base_url()."users/logout'>LOGOUT</a><br>";
}
else{
	redirect(base_url().'users/login');
	//echo "<a href='".base_url()."users/login'>LOGIN</a><br>";
}
if(!isset($post)){
	echo "no record found";
}
else{
foreach($post as $row){
	echo "<a href='".base_url()."posts/post/".$row['postID']."'><h3>title:".$row['title'].'</h3> <a href="'.base_url()."posts/editpost/".$row['postID'].'"> Edit </a> | <a href="'.base_url()."posts/deletepost/".$row['postID'].'">Delete</a> <br>';
	echo "post:".$row['post'].'<br>';
	echo "date:".$row['date'].'<br><br>';
}
}

echo "<br><br>";
echo $pages;