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
<div class="well ">     
                    <div class="minhead">
                        <h3>CLASS SCHEDULE</h3>
                    </div>
                    <br>
                   <!-- <button type="button" class="btn btn-default">Print</button>-->
                    <br>
                    <table class="table table-bordered">
                            <tr>
                                <th>SUBJCODE</th>
                                <th>DESCRIPTION</th>
                                <th>DAYS</th>
                                <th>TIME</th>
                                <th>BLDG/ROOM</th>
                                
                            </tr>
                <?php foreach ($query as $row){ ?>

                       
                       <tr>
                        <!--<td><?php echo $row->blockcode;?></td>-->
                        <td><?php echo $row->subjectcode;?></td>
                        <td><?php echo $row->description;?></td>

                        <!--<td><?php echo $row->daystart;?></td>
                        <td><?php echo $row->dayend;?></td>-->
                        <td><?php echo $row->sday;?></td>
                        <td><?php echo $row->stime;?></td>
                        <td><?php echo $row->roomcode;?>
                        <?php echo $row->building;?></td>

                    </tr>
                       
                    


        <?php } ?>  
</table>
</div>
        </div>