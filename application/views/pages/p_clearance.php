<div class="container-fluid">
  <div class="row">

    <img src="<?php echo base_url("_assets/img/logo3.png"); ?>">
      <!-- </div> -->
      
      <p class="header"><a href='<?php print(base_url().'index.php/NewCon/logout') ?>'> Logout</a></p>


  </div>
</div>
<!--SIDEBAR-->
    <div class="col-lg-2 col-lg-offset-1">
      <div>
        <img name="student_photo" src="<?php echo base_url("_assets/img/facebook-default-no-profile-pic2.jpg"); ?>" class="under1">
        <p class="over" name="student_name"></p>
        <img src="<?php echo base_url("_assets/img/img-f2.png"); ?>" class="under">
      </div>
      <div class="sidebar">
        <ul class="nav">
                    <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/p_getProfile') ?>"><b>Profile</b></a></li>
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/p_getGrades') ?>"><b>Grades</b></a></li>
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/p_getClearance') ?>"><b>Clearance</b></a></li>
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/email') ?>"><b>Messaging</b></a></li>
        </ul>
      </div> 
    </div> <!-- end of col-lg-2 -->
    
<div class="col-lg-8 main">
            <div class="well ">     
                    <div class="minhead">
                        <h3>CLEARANCE</h3>
                    </div>
                    <br><br>
                    <table class="table table-bordered">
                            <tr>
                                <th>SEM</th>
                                <th>SY</th>
                                <th>AMOUNT</th>
                                <th>DESCRIPTION</th>
                            </tr>
                <?php foreach ($res as $row){ ?>

                       
                       <tr>
                        <td><?php echo $row->sem;?></td>
                        <td><?php echo $row->sy;?></td>
                        <td><?php if($row->sum==0) echo "cleared"; else echo $row->sum;?></td>
                        <td><?php echo $row->accounttype;?></td>

                    </tr>
                       
                    


        <?php } ?>  
</table>
</div>
        </div>