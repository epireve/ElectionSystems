<?php error_reporting(E_ALL);?>
<? include("header.php");?>


    <div class="container">
	<?php 
	$edit = new users();
	$value = $edit->getUserById($_GET['id']);
	?>
	
      <div class="content">
        <div class="page-header">
          <h1>Edit Users</h1>
        </div>
        <div class="row">
          <div class="span10">
		<span style="text-align: center;color: red;"><?php if($_GET['error']==1) echo "Please fill all the field.";?></span>
          <form action="users.php" method="post" enctype="multipart/form-data"><!--Form-->
            <fieldset>
            
              <div class="clearfix">
                <label for="Course">Access</label>
                <div class="input">
                  <select name="lvl" id="Course">
                    <option>Select Access</option>            
                    <option value="1" <?php if($value['lvl']==1) echo "selected";?>>Vote Registrar</option>
                    <option value="2" <?php if($value['lvl']==2) echo "selected";?>>Candidate Registrar</option>
                    <option value="3" <?php if($value['lvl']==3) echo "selected";?>>Commision of Election</option>
                    <option value="4" <?php if($value['lvl']==4) echo "selected";?>>Super Admin</option>
                    </select>
                </div>
            </div>
              <div class="clearfix">
                <label for="Name">Username</label>
                <div class="input">
                  <input class="xlarge" id="Name" name="username" size="30" type="text" value="<?php echo $value['username'];?>">
                </div>
              </div>
               <div class="clearfix">
                <label for="Name">Password</label>
                <div class="input">
                  <input class="xlarge" id="Name" name="password" size="30" type="password">
                </div>
              </div>
               <div class="clearfix">
                <label for="Name">E-mail</label>
                <div class="input">
                  <input class="xlarge" id="Name" name="email" size="30" type="text" value="<?php echo $value['email'];?>">
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