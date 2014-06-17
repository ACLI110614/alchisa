<?php
if($success ==1 ){
	echo "updated!!! successful";
}
else{
	echo "error update";
	
}

echo '<form action="'.base_url().'posts/editpost/'.$post['postID'].'" method="post">';
echo 'title:<input type="text" name="title" value="'.$post['title'].'"/><br>';
echo 'description:<br>';
echo '<textarea name="post">'.$post['post'].'</textarea>';
echo '<input type="submit" value="edit Post">';
echo '</form>';