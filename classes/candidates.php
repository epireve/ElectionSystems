<?php
class candidates
{
	
	private function CheckDupe($matrix)
	{
		$sql = "SELECT id FROM candidates WHERE matrix='$matrix'";
		$result = mysql_num_rows(mysql_query($sql));
		if($result):
		return false;
		else:
		return true;
		endif;
	}
	

	
	public function addCandidate()
	{
		$name = $_POST['name'];
		$courses_id = $_POST['course'];
		$matrix = $_POST['matrixId'];
		$gender_id = $_POST['gender'];
		$position_id = $_POST['position'];
		$hold= $_POST['hold'];
		if(isset($_FILES['photo'])):
		$image_ext = $this->findexts($_FILES['photo']['name']);
		$target = "../candidates_images/".$_POST['matrixId'].".".$image_ext; 
		if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)): 
		$image=$target;
		endif;		
		endif;
		
		if($this->CheckDupe($_POST['matrixId'])):
		if($image==""):
		$sql = "INSERT INTO candidates (name,courses_id,matrix,gender_id,position_id,hold) VALUES ('$name','$courses_id','$matrix','$gender_id','$position_id','$hold')";
		
		else:
		$sql = "INSERT INTO candidates (name,images,courses_id,matrix,gender_id,position_id,hold) VALUES ('$name','$image','$courses_id','$matrix','$gender_id','$position_id','$hold')";
		endif;
		$result = mysql_query($sql)or die(mysql_error());
		return $result;	
		else:
		return false;	
		endif;
	}
	
	public function editCandidate($id)
	{
		
		$name = $_POST['name'];
		$courses_id = $_POST['course'];
		$matrix = $_POST['matrixId'];
		$gender_id = $_POST['gender'];
		$position_id = $_POST['position'];
		$hold= $_POST['hold'];
		if(isset($_FILES['photo'])):
		$image_ext = $this->findexts($_FILES['photo']['name']);
		$target = "../candidates_images/".$_POST['matrixId'].".".$image_ext; 
		if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)): 
		$image=$target;
		endif;		
		endif;
		
		
		if($image==""):
		$sql = "UPDATE candidates SET name='$name',courses_id='$courses_id',matrix='$matrix',gender_id='$gender_id',position_id='$position_id',hold='$hold' WHERE id=$id";
		
		else:
		$sql = "UPDATE candidates SET name='$name',images='$image',courses_id='$courses_id',matrix='$matrix',gender_id='$gender_id',position_id='$position_id',hold='$hold' WHERE id=$id";
		endif;
		$result = mysql_query($sql)or die(mysql_error());
		return $result;	
		
	}
	
 	public function findexts ($filename) 
    { 
 		$ext = substr($filename, strrpos($filename, '.') + 1);
 		return $ext;
  	}
	
	private function getCandidateId($matrix)
	{
		$sql = "SELECT id FROM candidates WHERE matrix ='$matrix'";
		$result = mysql_query($sql);
		$id = mysql_fetch_array($result);
		return $id['id'];
	}
	
	public function getCandidateById($id)
	{
		$sql = "SELECT * FROM candidates WHERE id ='$id'";
		$result = mysql_query($sql);
		return mysql_fetch_array($result);
		
	}
	
	
	public function listCandidates()
	{
		$sql = "SELECT * FROM candidates ORDER BY id ASC LIMIT 0,100";
		$result = mysql_query($sql);
		return $result;
	}
	
	public function killCandidate($id)
	{
		$sql = "DELETE FROM candidates WHERE id='$id'";
		mysql_query($sql);
	}
	
	public function plusOne($id)
	{
		$sql = "UPDATE candidates SET vote_count = vote_count +1 WHERE id ='$id'";
		mysql_query($sql)or die(mysql_error());	
	
	}

	public function plusAll($id)
	{

		if(isset($_POST['votenow'])){//check to see if the delete button has been pressed

		   	if(isset($_POST['voting'])){ //check to see if any boxes have been checked 
		        $num = 0;//used to count the number of rows that were deleted
		        $box = $_POST['voting'];
		        while (list ($key,$id) = @each ($box)) { //loop through all the checkboxes
		              $num++;
		              $sql="UPDATE candidates SET vote_count = vote_count +1 WHERE id ='$id'";//delete any that match id
		              $result=mysql_query($sql);//send the query to mysql
		        }
		        //print the logs that were deleted
		        echo"";
		   }
		   else{//no boxes checked
		   echo "";
		   }
		}
	
	}
	
	public function electionUp()
	{
		$sql = "SELECT * FROM candidates ORDER BY vote_count ASC";
		$result = mysql_query($sql);
		return $result;
		
	}
	
	public function electionDown()
	{
		
		$sql = "SELECT * FROM candidates ORDER BY vote_count DESC";
		$result = mysql_query($sql);
		return $result;
		
	}
	
	public function electionFame()
	{
		$sql = "SELECT * FROM candidates ORDER BY vote_count DESC LIMIT 0,1";
		$result = mysql_query($sql)or die(mysql_error());
		return $result;
	}

	public function checkRow()
	{
		$sql = "SELECT * FROM candidates ORDER BY id ASC LIMIT 0,100";
		$result = mysql_query($sql);
		$count = mysql_num_rows($result);
		return $count;
	}
}
