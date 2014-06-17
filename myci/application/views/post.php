<?php
if(!isset($post)){
	echo "data not available";
}else {
	
	echo "<p>".$post['title']."</p>";
	echo "<p>".$post['post']."</p>";
	echo "<p>".$post['active']."</p>";
}