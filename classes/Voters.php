<?php
class Voters
{
	
	private function CheckDupe($mykad,$matrix)
	{
		$sql = "SELECT id FROM voters WHERE mykad='$mykad' or matrix='$matrix'";
		$result = mysql_num_rows(mysql_query($sql));
		if($result):
		return false;
		else:
		return true;
		endif;
	}
	
	public function validateVoter($mykad,$matrix)
	{
		$sql = "SELECT id FROM voters WHERE mykad='$mykad' AND matrix='$matrix'";
		$result = mysql_num_rows(mysql_query($sql));
		if($result):
		return true;
		else:
		return false;
		endif;
	}
	
	public function validateVoter2($matrix,$uticket)
	{
		$sql = "SELECT id FROM voters WHERE matrix='$matrix' AND unique_ticket='$uticket'";
		$result = mysql_num_rows(mysql_query($sql));
		if($result):
		return true;
		else:
		return false;
		endif;
	}
	
	public function votingStatus($matrix)
	{
		$sql = "SELECT vote FROM voters WHERE matrix ='$matrix'";
		$result = mysql_query($sql);
		$vote = mysql_fetch_row($result);
		
		if($vote[0]):
		return false;
		else:
		return true;
		endif;
		
	}
	
	public function AddVoters($mykad,$matrix)
	{

		if($this->CheckDupe($mykad,$matrix) && !empty($mykad) && !empty($matrix)):
		$sql = "INSERT INTO voters (mykad,matrix) VALUES ('$mykad','$matrix')";
		$result = mysql_query($sql)or die(mysql_error());
		return $result;	
		else:
		return false;	
		endif;
	}
	
	
	private function getVotersId($mykad,$matrix)
	{
		$sql = "SELECT id FROM voters WHERE mykad='$mykad' AND matrix ='$matrix'";
		$result = mysql_query($sql);
		$id = mysql_fetch_array($result);
		return $id['id'];
	}
	
	public function getVoterById($id)
	{
		$sql = "SELECT * FROM voters WHERE id ='$id'";
		$result = mysql_query($sql);
		return mysql_fetch_array($result);
		
	}
	
	public function createTicket($mykad,$matrix)
	{
	 list($usec, $sec) = explode(' ', microtime());
   	 srand((float) $sec + ((float) $usec * 100000));

     $validchars[1] = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
     $validchars[2] = "0123456789";
     
     $unique = "";
   	 $ticket  = "";
     $counter   = 0;

	 while ($counter < 3) {
   		  $actChar = substr($validchars[1], rand(0, strlen($validchars[1])-1), 1);

    		 // All character must be different
    		if($counter%2==1): 
     		if (!strstr($unique, $actChar)):
        	$unique .= $actChar;
        	$counter++;
        	endif;
        	else:
        	$unique .= $actChar;
        	$counter++;
        	endif;
   		}
   		
   		$counter=0;
   		
   		while ($counter < 7) {
   		  $actChar = substr($validchars[2], rand(0, strlen($validchars[2])-1), 1);

    		 // All character must be different
    		if($counter%2==0):
     		if (!strstr($ticket, $actChar)):
        	$ticket .= $actChar;
        	$counter++;
        	endif;
        	else:
        	$ticket .= $actChar;
        	$counter++;
        	endif;
   		}
    $uticket = substr($unique."".$ticket,0,10);		
   	$sql = "UPDATE voters SET unique_ticket = '$uticket' WHERE id = '".$this->getVotersId($mykad,$matrix)."'";
   	mysql_query($sql)or die(mysql_error());
	}
	
	public function showTicket($mykad,$matrix)
	{
		$id = $this->getVotersId($mykad,$matrix);
		$sql = "SELECT unique_ticket FROM voters WHERE id ='$id'";
		$result = mysql_query($sql);
		$uticket = mysql_fetch_row($result);
		return $uticket[0];
		
	}
	
	public function editVoter($id)
	{

		$mykad = $_POST['mykad'];
		$matrix = $_POST['matrix'];
		$uticket = $_POST['uticket'];
		$voted = $_POST['voted'];
		$sql = "UPDATE voters SET mykad = '$mykad', matrix ='$matrix', unique_ticket = '$uticket', vote='$voted' WHERE id=$id";

		$result = mysql_query($sql)or die(mysql_error());
		return $result;	
		
	}
	
	public function listVoters()
	{
		$sql = "SELECT * FROM voters ORDER BY id ASC LIMIT 0,10";
		$result = mysql_query($sql);
		return $result;
	}
	
	public function killVoter($id)
	{
		$sql = "DELETE FROM voters WHERE id='$id'";
		mysql_query($sql);
	}
	
	public function revokeTheVote($matrix)
	{
		$sql = "UPDATE voters SET vote = 1 WHERE matrix ='$matrix' ";
		mysql_query($sql);
	}
}

