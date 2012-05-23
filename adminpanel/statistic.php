<? include("header.php");?>
    <div class="container">
      <div class="content">
        <div class="page-header">
          <h1>Statistic of Election</h1>
        </div>
        
        <div class="row">
          <div class="span8">
              <div class="hero-unit" style="width:300px; box-shadow:0px 0px 3px #C0C0C0;">
                        <h4>Election Result DOWN</h4>
                          <?php 
                          $elect = new candidates();
                          $result=$elect->electionDown();
                          $i=1;
                          while($election = mysql_fetch_array($result)):
                          echo $i.". ".$election['name']."<br>";
                          $i++; 
                          endwhile;?>
                                             
                          
                        <br><h4>Election Result UP</h4>
                          <?php 
                          $result=$elect->electionUp();
                          $i=1;
                          while($election = mysql_fetch_array($result)):
                          echo $i.". ".$election['name']."<br>";
                          $i++; 
                          endwhile;?>
                          
                          
                        <br><h4>Hall Of Fame (Highest Vote)</h4>
                          <?php 
                          $result=$elect->electionFame();
                          $election = mysql_fetch_array($result);
                          echo $election['name']."<br>";
                          ;?>
              </div>
            </div>

		      <div class="span2">
            <img src="../images/winner.jpg" style="padding-top:40px;"><br><br>
            <img src="../images/winner50.png" width="226" height="226">
        </div>
        </div>
      </div>


<? include("footer.php");?>