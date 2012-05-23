<? include("header.php");?>
   
 <?php 
 if(isset($_POST['update'])):
$update = new Voters();
if($update->editVoter($_POST['id'])):
$msg="Candidate has been updated.";
else:
$msg="Fail to save update change(s).";
endif;
endif;
 ?>
    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>List of Voters</h1>
        </div>
        <div class="row">
          <div class="span10">
			     <span style="text-align: center"><?php echo $msg;?></span>
            
        <table class="bordered-table">
        <thead>
          <tr>
            <th>#</th>
            <th>MyKad</th>
            <th>Matrix</th>
            <th>Unique Ticket</th>
            <th>Voted</th>
            <?php if($_SESSION['access']>=3):?>
            <th>Edit</th>
            <?php endif;?>
          </tr>
        </thead>
        <tbody>
 <?php 
 $users = new Voters;
 $lvoters = $users->listVoters();
 $i=1;

 while( $voters = mysql_fetch_array($lvoters)):
 ?>
          <tr>
            <th><?php echo $i;?></th>
            <td><?php echo $voters['mykad'];?></td>
            <td><?php echo $voters['matrix'];?></td>
            <td><?php echo $voters['unique_ticket'];?></td>
            <td><?php if($voters['vote']): echo "Yes"; else: echo "No"; endif;?></td>
            <?php if($_SESSION['access']>=3):?>
            <td><a href="edit_voter.php?id=<?php echo $voters['id'];?>">Edit</a>&nbsp;&nbsp;<a href="delete_voter.php?id=<?php echo $voters['id'];?>">Delete</a></td>
            <?php endif;?>
          </tr>
          <?php $i++;?>
<?php endwhile;?>          
        </tbody>
      </table>

          </div>
          
        </div>
      </div>

<? include("footer.php");?>