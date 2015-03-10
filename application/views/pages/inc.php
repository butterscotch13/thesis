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

<div class="col-lg-8 main">
    <div id="list" class="well">
        <div class="minhead">
                <h3>INC GRADE MONITOR</h3>
        </div>
            <br><br>
            <table class="table table-bordered">
                <tr>
                    <th>Subject Code</th>
                    <th>Subject Description</th>
                    <th>Sem</th>
                    <th>SY</th>
                    <th>Remark</th>
                    <th>Credit</th>
                </tr>
                <tr>
               <?php foreach ($query as $row){ ?>
                    <td><?php echo $row->subjectcode;?></td>
                    <td><?php echo $row->description;?></td>
                    <td><?php echo $row->sem;?></td>
                    <td><?php echo $row->sy;?></td>
                    <td><?php echo $row->remark;?></td>
                    <td><?php echo $row->numofunit;?></td>
                </tr>
                <?php } ?>
        </table>
    </div>

                    <h4>Note: Uncompplied INCs after 1 year are considered to be dropped.</h4>

</div>        