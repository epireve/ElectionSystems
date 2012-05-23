<?php 
error_reporting(E_ALL);
if(isset($_POST['submit'])||isset($_POST['update'])):
if(isset($_POST['name'])&&isset($_POST['course'])&&isset($_POST['matrixId'])&&isset($_POST['gender'])&&isset($_POST['position'])&&isset($_POST['hold'])):
?>
<? include("header.php");?>
<?php 
if(isset($_POST['update'])):
$update = new candidates;
if($update->editCandidate($_POST['id'])):
$msg="Candidate has been updated.";
else:
$msg="Fail to save update change(s).";
endif;
else:
$register = new candidates;
if($register->addCandidate()):
$msg="Candidate has been registered.";
else:
$msg="Candidate already registered.";
endif;
endif;

else:
header("Location: regcand.php?error=1");
endif;
else:
include("header.php");
endif;

?>
 

    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>List of Candidate</h1>
        </div>
        <div class="row">
          <div class="span10">

          <a href="regcand.php"><input type="button" value="Register Candidate" class="btn"></a><br><br>
			<span style="text-align: center"><?php echo $msg;?></span>
            <table class="bordered-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Candidacy Number</th>
            <th>Position</th>
            <th>Hold</th>
            <th>Vote Count</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
 <?php 
 $list = new candidates;
 $result = $list->listCandidates();
 $i=1;
 $position = new position();
 
 while( $candidate = mysql_fetch_array($result)):
 ?>
          <tr>
            <th><?php echo $i;?></th>
            <td><?php echo $candidate['name'];?></td>
            <td><img src="<?php echo $candidate['images'];?>" width="100px" height="100px"></td>
            <td><?php echo $candidate['matrix'];?></td>
            <td><?php echo $position->getPositionName($candidate['position_id']);?></td>
            <td><?php if($candidate['hold']) echo "Open"; else echo "Hold";?></td>
            <td><?php echo $candidate['vote_count'];?></td>
            <td><a href="edit_candidate.php?id=<?php echo $candidate['id']?>">Edit</a>&nbsp;&nbsp;<a href="delete_candidate.php?id=<?php echo $candidate['id']?>">Delete</a></td>
          </tr>
          <?php $i++;?>
<?php endwhile;?>   
<?php if($i==1):?>
          <tr>
            <th colspan="8" style="text-align: center;">No Candidate(s)</th>
          </tr>
          <?php endif;?>          
        </tbody>
      </table>

          </div>
          
        </div>
      </div>

<?php include("footer.php");?>