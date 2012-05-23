<?php error_reporting(E_ALL);?>
<? include("header.php");?>


    <div class="container">
	<?php 
	$edit = new Voters();
	$value = $edit->getVoterById($_GET['id']);
	?>
	
      <div class="content">
        <div class="page-header">
          <h1>Edit Voter</h1>
        </div>
        <div class="row">
          <div class="span10">
		<span style="text-align: center;color: red;"><?php if($_GET['error']==1) echo "Please fill all the field.";?></span>
          <form action="voters.php" method="post" enctype="multipart/form-data"><!--Form-->
            <fieldset>
              <div class="clearfix">
                <label for="Name">MyKad</label>
                <div class="input">
                  <input class="xlarge" id="Name" name="mykad" size="30" type="text" value="<?php echo $value['mykad'];?>">
                </div>
              </div>
              
              <div class="clearfix">
                <label for="Name">Matrix</label>
                <div class="input">
                  <input class="xlarge" id="Name" name="matrix" size="30" type="text" value="<?php echo $value['matrix'];?>">
                </div>
              </div>
              
              <div class="clearfix">
                <label for="Name">Unique Ticket</label>
                <div class="input">
                  <input class="xlarge" id="Name" name="uticket" size="30" type="text" value="<?php echo $value['unique_ticket'];?>">
                </div>
              </div>


              <div class="clearfix">
                <label for="Gender">Voted</label>
                <div class="input">
                  <select name="voted" id="Position">                    
                                      <option value="1" <?php if($value['vote']==1) echo "selected"?>>Yes</option>
                    <option value="0" <?php if($value['vote']==0) echo "selected"?>>No</option>
                  </select>
                </div>
            </div>
            
            <div class="clearfix">
                <label for="Name">Registered on</label>
                <div class="input">
                  <input class="xlarge" id="Name"  size="30" type="text" value="<?php echo $value['timestamp'];?>" disabled>
                </div>
              </div>

         			<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
              <button type="submit" name="update" class="btn primary">Update</button><br><br>
            </fieldset>
          </form>

            

          </div>
          
        </div>
      </div>

<? include("footer.php");?>