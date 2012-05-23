<?php error_reporting(E_ALL);?>
<? include("header.php");?>

    <div class="container">
	<?php 
	$edit = new courses();
	$value = $edit->getCourseById($_GET['id']);
	?>
	
      <div class="content">
        <div class="page-header">
          <h1>Edit Course</h1>
        </div>
        <div class="row">
          <div class="span10">
		<span style="text-align: center;color: red;"><?php if($_GET['error']==1) echo "Please fill all the field.";?></span>
          <form action="setup.php" method="post" enctype="multipart/form-data"><!--Form-->
            <fieldset>
              <div class="clearfix">
                <label for="Name">Name</label>
                <div class="input">
                  <input class="xlarge" id="Name" name="course" size="30" type="text" value="<?php echo $value['name'];?>">
                </div>
              </div>
              
             

         			<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
              <button type="submit" name="updateC" class="btn primary">Update</button><br><br>
            </fieldset>
          </form>

            

          </div>
          
        </div>
      </div>

<? include("footer.php");?>