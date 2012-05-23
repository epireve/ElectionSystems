<?php
class courses
{
	public function addCourse()
	{
		$name = $_POST['Course'];
		$sql = "INSERT INTO courses (id,name) VALUES ('','$name')";
		$result = mysql_query($sql)or die(mysql_error());
		return $result;
	}
	
	public function listCourses()
	{
		$sql = "SELECT * FROM courses ORDER BY id ASC LIMIT 0,10";
		$result = mysql_query($sql);
		return $result;
	}
	
	public function editCourse($id)
	{
		$name = $_POST['course'];
		$sql = "UPDATE courses SET name='$name' WHERE id='$id'";
		$result = mysql_query($sql)or die(mysql_error());
		return $result;
	}
	
	public function getCourseById($id)
	{
		$sql = "SELECT * FROM courses WHERE id ='$id'";
		$result = mysql_query($sql);
		return mysql_fetch_array($result);
	}
	
	public function killCourse($id)
	{
		$sql = "DELETE FROM courses WHERE id='$id'";
		mysql_query($sql);
	}
	
	public function getCourseName($id)
	{
		$sql = "SELECT name FROM courses WHERE id = $id";
		$result = mysql_query($sql);
		$name = mysql_fetch_row($result);
		$name = $name[0];
		return $name;
	}
}
?>