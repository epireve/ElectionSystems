<?php
class gender
{
	public function addGender()
	{
		$name = $_POST['gender'];
		$prefix = $_POST['prefix'];
		$sql = "INSERT INTO gender (id,name) VALUES ('','$name')";
		$result = mysql_query($sql)or die(mysql_error());
		return $result;
	}
	
	public function listGenders()
	{
		$sql = "SELECT * FROM gender ORDER BY id ASC LIMIT 0,10";
		$result = mysql_query($sql);
		return $result;
	}
	
	public function editGender($id)
	{
		$name = $_POST['gender'];
		$sql = "UPDATE gender SET name='$name' WHERE id='$id'";
		$result = mysql_query($sql)or die(mysql_error());
		return $result;
	}
	
	public function getGenderById($id)
	{
		$sql = "SELECT * FROM gender WHERE id ='$id'";
		$result = mysql_query($sql);
		return mysql_fetch_array($result);
	}
	
	public function killGender($id)
	{
		$sql = "DELETE FROM gender WHERE id='$id'";
		mysql_query($sql);
	}
	
	public function getGenderName($id)
	{
		$sql = "SELECT name FROM gender WHERE id = $id";
		$result = mysql_query($sql);
		$name = mysql_fetch_row($result);
		$name = $name[0];
		return $name;
	}
}
?>