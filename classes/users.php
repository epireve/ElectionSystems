<?php
class users
{
	
	private function CheckDupe($username,$email)
	{
		$sql = "SELECT id FROM users WHERE username='$username' or email='$email'";
		$result = mysql_num_rows(mysql_query($sql));
		if($result):
		return false;
		else:
		return true;
		endif;
	}	
	
	public function validateUser($username,$password)
	{
		$password = md5($password);
		$sql ="SELECT id FROM users WHERE username='$username' AND password='$password'";
		$result = mysql_num_rows(mysql_query($sql));
		if($result):
		return true;
		else:
		return false;
		endif;
	}
	
	public function getUserLevel($username)
	{
		$sql = "SELECT lvl FROM users WHERE username='$username'";
		$result = mysql_query($sql);
		$level = mysql_fetch_row($result);
		return $level[0];	
	}

	public function getUserById($id)
	{
		$sql = "SELECT * FROM users WHERE id ='$id'";
		$result = mysql_query($sql);
		return mysql_fetch_array($result);
		
	}
	//CRUD Below

	public function createUser($username,$password,$email,$lvl)
	{
		
		$password = md5($password);
		if($this->CheckDupe($username,$email)):
		$sql = "INSERT INTO users (username,password,email,lvl) VALUES ('$username','$password','$email','$lvl')";
		$result = mysql_query($sql)or die(mysql_error());
		return $result;	
		else:
		return false;	
		endif;
	}
		
	public function listUsers()
	{
		if($_SESSION['access']==3):
		$sql = "SELECT * FROM users WHERE lvl<3 ORDER BY id ASC LIMIT 0,10";
		endif;
		if($_SESSION['access']==4):
		$sql = "SELECT * FROM users ORDER BY id ASC LIMIT 0,10";
		endif;
		$result = mysql_query($sql);
		return $result;
	}
	
	public function editUser($id)
	{
		
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$email = $_POST['email'];
		$lvl = $_POST['lvl'];
		
				
		$sql = "UPDATE users SET username='$username',password='$password',email='$email',lvl='$lvl' WHERE id=$id";
		$result = mysql_query($sql)or die(mysql_error());
		return $result;	
		
	}
	
	public function killUsers($id)
	{
		$sql = "DELETE FROM users WHERE id='$id'";
		mysql_query($sql);
	}
	
}
