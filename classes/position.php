<?php
class position
{
	public function addPosition()
	{
		$name = $_POST['position'];
		$prefix = $_POST['prefix'];
		$sql = "INSERT INTO position (id,prefix,name) VALUES ('','$prefix','$name')";
		$result = mysql_query($sql)or die(mysql_error());
		return $result;
	}
	
	public function listPositions()
	{
		$sql = "SELECT * FROM position ORDER BY id ASC LIMIT 0,10";
		$result = mysql_query($sql);
		return $result;
	}
	
	public function getPositionName($id)
	{
		$sql = "SELECT name FROM position WHERE id = $id";
		$result = mysql_query($sql);
		$name = mysql_fetch_row($result);
		$name = $name[0];
		return $name;
	}
	
	public function getPositionPrefix($id)
	{
		$sql = "SELECT prefix FROM position WHERE id = $id";
		$result = mysql_query($sql);
		$name = mysql_fetch_row($result);
		$name = $name[0];
		return $name;
	}
	
	public function editPosition($id)
	{
		$name = $_POST['position'];
		$prefix = $_POST['prefix'];
		$sql = "UPDATE position SET name='$name',prefix='$prefix' WHERE id='$id'";
		$result = mysql_query($sql)or die(mysql_error());
		return $result;
	}
	
	public function getPositionById($id)
	{
		$sql = "SELECT * FROM position WHERE id ='$id'";
		$result = mysql_query($sql);
		return mysql_fetch_array($result);
	}
	
	public function killPosition($id)
	{
		$sql = "DELETE FROM position WHERE id='$id'";
		mysql_query($sql);
	}
}
?>