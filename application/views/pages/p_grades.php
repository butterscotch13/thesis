<div class="container-fluid">
  <div class="row">

    <img src="<?php echo base_url("_assets/img/logo3.png"); ?>">
      <!-- </div> -->
      
      <p class="header"> | <a href='<?php print(base_url().'index.php/NewCon/logout') ?>'> Logout</a></p>


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
<div id="list" class="well">
   <div class="minhead">
                        <h3><span class="glyphicon glyphicons-podium"></span>GRADES</h3>
                    </div>
                    <br><br>
                <table class="table table-bordered">
                   <tr>
                    <tr>

                    </tr>           
                   </tr>
                    <tr>
                       <th>SUBJCODE</th>
                       <th>SUBJECT DESCRIPTION</th>
                       <th>GRADE</th>
                    </tr>
                <?php foreach ($result as $row){ ?>
                    <tr>
                        <td><?php echo $row->subjectcode;?></td>
                        <td><?php echo $row->description;?></td>
                        <td><?php echo $row->final;?></td>
                    </tr>           
                <?php } ?>
    </table>
    </div>
    </div>
</div>