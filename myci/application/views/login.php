<?php
if($error == 1){
	echo "Your username / password did not match";
}

echo "<form action='".base_url()."users/login' method='post'>";
echo "username:<input type='text' name='username'>";
echo "password:<input type='text' name='password'>";
echo "user type:";
echo "<select name='user_type'>";
echo "<option value='' selected='selected'>--</option>";
echo "<option value='admin'>Admin</option>";
echo "<option value='author'>Author</option>";
echo "<option value='user'>User</option>";
echo "</select>";
echo "<input type='submit' value='login'>";

echo "</form>";