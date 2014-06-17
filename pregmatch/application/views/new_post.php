<?php
echo '<form action="'.base_url().'posts/new_post" method="post">';
echo 'title:<input type="text" name="title"/><br>';
echo 'description:<br>';
echo '<textarea name="post"></textarea>';
echo '<input type="submit" value="Add Post">';
echo '</form><br>';
echo anchor('upload/do_upload', 'Upload Another File!'); 