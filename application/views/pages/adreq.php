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
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/getProfile') ?>"><b>Profile</b></a></li>
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/getGrades') ?>"><b>Grades</b></a></li>
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/getClearance') ?>"><b>Clearance</b></a></li>
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/getInc') ?>"><b>INC Grade Monitor</b></a></li>
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/getSchedule') ?>"><b>Class Schedule</b></a></li>
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/getAssessment') ?>"><b>Assessment of Fees</b></a></li>
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/checkadreq') ?>"><b>Admission Requirements</b></a></li>
        </ul>
      </div> 
    </div> <!-- end of col-lg-2 -->
    
   <div class="col-lg-8 main ">
            <div class="">      
                <div class="well ">     
                    <div class="minhead">
                        <h3>ADMISSION REQUIREMENTS</h3>
                    </div>
                    <br>
                    <br>
                    <table class="table table-bordered">
                            <tr>
                                <th>HS CARD</th>
                                <th>TOR</th>
                                <th>DISMISSAL</th>
                                <th>GOOD MORAL</th>
                                <th>BIRTH CERTIFICATE</th>
                                <th>FORM137</th>
                                <th>GRADE EVALUATION</th>
                            </tr>
                <?php foreach ($query as $row){ ?>
                       <tr>
                        <td><?php echo $row->hscard==1? 'yes':'no';?></td>
                        <td><?php echo $row->tor==1? 'yes':'no';?></td>
                        <td><?php echo $row->dismissal==1? 'yes':'no';?></td>
                        <td><?php echo $row->bcrtfcate==1? 'yes':'no';?></td>
                        <td><?php echo $row->form137==1? 'yes':'no';?></td>
                        <td><?php echo $row->grade_evaluation==1? 'yes':'no';?></td>
                      </tr>
                <?php } ?>  
                </table>
          </div>
    </div>
</div>