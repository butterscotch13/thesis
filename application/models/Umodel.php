<?php

class Umodel extends CI_Model {

	function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function student_login($studentid,$password)
    {

	    	$sql = " 
	    			SELECT * FROM users 
	    				WHERE 
	    					  studentid = '$studentid' AND
	    				  	  password = '$password'

	    		   ";

	    	$result = $this->db->query($sql);

	    	if($result->num_rows()==1){
               return $result->result();
           }
          else{
               echo "ERROR";
          }
	}

	public function parent_login($p_name,$password)
	{
	    	$query = " 
	    			SELECT * FROM p_login 
	    				WHERE 
	    					  p_fathername = '$p_name' OR p_mothername='$p_name'  AND
	    				  	  p_pass = '$password'
	    			";

	    	$result = $this->db->query($query);

	    	if($result->num_rows()==1){
               return $result->result();  
          	}
          else{
               echo "ERROR";
    		}
	
	}

	public function result_pGrade($p_name)
	{
	    	$query = " 
	    			SELECT p_name FROM p_login 
	    				WHERE 
	    					  p_name = '$p_name' AND
	    				  	  p_pass = '$password'

	    		   ";

	    	$result = $this->db->query($query);

	    	if($result->num_rows()==1){
               return $result->result();  
          	}
          	else{
               echo "ERROR";
    		}
	}


	public function result_getEditProfile($studentid,$daddress)
	{
		$sql = "UPDATE studentinfo SET currentaddress='$daddress' WHERE studentid='$studentid'";

		$result = $this->db->query($sql);
		if($result)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function result_getChangePass($studentid,$oldpass,$newpass)
	{
		$sql = "UPDATE users SET password='$newpass' WHERE studentid='$studentid' AND password='$oldpass'";

		$result = $this->db->query($sql);
		if($result)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function result_getProfile($studentid)
	{
		  $this->db->select('studentcur.studentid, curriculum.coursecode, curriculum.description, curriculum.curcode, studentinfo.firstname,studentinfo.lastname, studentinfo.placeofbirth, studentinfo.sex, studentinfo.currentaddress, studentinfo.homephone, studentinfo.mobile, studentinfo.maritalstatus, studentinfo.religion, studentinfo.mothername, studentinfo.fathername, studentinfo.dateofbirth, studentinfo.citizenship');
	      $this->db->from('studentcur');
	      $this->db->join('curriculum','studentcur.curcode=curriculum.curcode');
	      $this->db->join('studentinfo','studentcur.studentid=studentinfo.studentid');
	      $this->db->where('studentcur.studentid',$studentid);
	      $query=$this->db->get();
	      return $query->result();
	}

	function result_getGrades($studentid)
	{
	      	$sql="SELECT g.studentid, sb.subjectcode, s.description,sb.sem,sb.sy, g.final 
					FROM grades g 

					JOIN subjectblocking sb ON g.blockcode=sb.blockcode

					JOIN subjects s ON sb.subjectcode=s.subjectcode

					WHERE g.studentid='2010-F0767'
					ORDER BY sy,sem
					";
			$result = $this->db->query($sql);
			$result = $result->result();
			return $result;
	    
	}

	function result_miscfee($studentid)
	{
			$sql=
			"
			select miscfee from assessment r
			INNER JOIN register s ON r.regnum = s.regnum
			INNER JOIN studentinfo p ON s.studentid= p.studentid
			WHERE p.studentid='$studentid'
			;
			";
			$result = $this->db->query($sql);
			$result = $result->result();
			return $result;
	}

	public function result_getSchedule($studentid)
	{
		$query="SELECT g.studentid, g.blockcode, sb.subjectcode, sb.daystart, sb.dayend, sb.stime, sb.sday, (ii.firstname || ' ' || ii.lastname) AS instructor, s.description, sb.roomcode, r.building FROM grades g 

				JOIN subjectblocking sb ON g.blockcode=sb.blockcode
				JOIN instructorinfo ii ON sb.instructorid=ii.instructorid
				INNER JOIN subjects s ON sb.subjectcode=s.subjectcode
				JOIN room r ON sb.roomcode=r.roomcode

				WHERE g.studentid='$studentid'
				ORDER BY  sb.daystart ASC, sb.stime like '%AM%' DESC;";
	    
	    $result=$this->db->query($query);
		$result = $result->result();
		return $result;
	}

	public function result_getAssessment($studentid)
	{
		$query = "select g.studentid, sb.subjectcode, s.description, s.price FROM grades g
				INNER JOIN subjectblocking sb ON g.blockcode=sb.blockcode
				INNER JOIN subjects s ON sb.subjectcode=s.subjectcode
				WHERE g.studentid='$studentid'
				ORDER BY sb.sem DESC, sb.sy DESC";

		$result=$this->db->query($query);
		$result = $result->result();
		return $result;    
	}

	public function result_getInc($studentid)
	{
		$query =" SELECT g.studentid, sb.subjectcode, s.description, si.firstname, g.blockcode, g.final, g.remark, sb.sem, sb.sy, s.numofunit from grades g
				INNER JOIN subjectblocking sb ON g.blockcode=sb.blockcode
				INNER JOIN subjects s ON sb.subjectcode=s.subjectcode
				INNER JOIN studentinfo si ON g.studentid=si.studentid
				WHERE g.studentid='$studentid'
				AND final='INC';";

		$result=$this->db->query($query);
		$res = $result->result();
		return $res;
	}

	public function result_getAddreq($studentid)
	{
		$this->db->select('studentid, lastname, firstname,middlename,hscard, tor,dismissal,goodmoral,bcrtfcate, form137, grade_evaluation');
		$this->db->from('studentinfo');
	    $this->db->where('studentid', $studentid);
	    $query=$this->db->get();
	    return $query->result();
	}


	public function result_getClearance($studentid)
	{
		$query =" 
				SELECT register.studentid,
    					register.sem,
    					register.sy,
    			sum(balance.amount) AS sum
   				FROM register,
    				accountspayable,
    				balance
  				WHERE register.regnum = balance.regnum AND accountspayable.accountno = balance.accountno AND register.studentid='$studentid'
 				GROUP BY register.studentid, register.sem, register.sy;
				";

		$result=$this->db->query($query);
		$res = $result->result();
		return $res;
	}
	
	function result_getTuition($studentid)
	{
		$sql=
			"
			SELECT(
			(SELECT  sum(s.price) total_tuition FROM subjects s
			INNER JOIN subjectblocking sb ON s.subjectcode=sb.subjectcode
			INNER JOIN grades g ON sb.blockcode=g.blockcode
			WHERE g.studentid='$studentid'
			AND sb.sem=2) 
			+
			(select miscfee from assessment ass
			JOIN
			register rg ON ass.regnum=rg.regnum
			WHERE
			rg.studentid='$studentid'
			) 
			) as total_tuition
			";
			$result = $this->db->query($sql);
			$result = $result->result();
			return $result;
	}

	function result_totalAssessment($studentid)
	{
		$sql=
			"
			SELECT sum(s.numofunit) total_units, sum(s.price) total_tuition FROM subjects s
			INNER JOIN subjectblocking sb ON s.subjectcode=sb.subjectcode
			INNER JOIN grades g ON sb.blockcode=g.blockcode
			WHERE g.studentid='$studentid'
			
			";

			$result = $this->db->query($sql);
			$totalAssessment = $result->result();
			return $totalAssessment;	
	}

	function test_email()
	{ 
		$sender_name = "one";						//name of the sender from the contact form
		$sender_email = "marjonerey@gmail.com";			//email of the sender from the contact form
		$sender_subject = "Test Email from CI";			//email subject
		$sender_message = "This is a test Message";		//email message/body
		$receiver_email = "natzinishawesome@gmail.com";	//admin email as receiver
		$receiver_name = "natzinishawesome";			//admin name as receiver
		
		/* 
		 * Load phpmailer library. library files: ~/application/libraries/phpmailer.php and class.smtp.php
		*/
		 $this->load->library('phpmailer');
		
		try {
			
			/*
			 * These phpmailer settings for smtp are fixed and highly recommended to use. 
			*/
			//BEGIN SMTP settings
			$this->phpmailer->IsSMTP();
			$this->phpmailer->SMTPDebug   = 1;
			$this->phpmailer->SMTPAuth   = true;
			$this->phpmailer->SMTPSecure = 'ssl';
			$this->phpmailer->Host = 'smtp.gmail.com';
			$this->phpmailer->Port = 465;
			//END
			
			/*
			 * Change username and password to an active gmail account
			 * If an authentication problem occurs, follow these steps:
			 * 1 - Login to your gmail account using browser web mail portal (https://mail.google.com)
			 * 2 - Then go to https://www.google.com/settings/security/lesssecureapps and make sure to turn on the access by selecting the "turn on" radio option
			 * 3 - Then go to https://accounts.google.com/DisplayUnlockCaptcha click the "Continue" button (assuming you are still logged into your gmail account)
			 * 4 - Test the app again and contact me if you still getting the error. 
			 */
			$this->phpmailer->Username = 'natzinishawesome@gmail.com';                 
			$this->phpmailer->Password = 'n477yr0425'; 
			
			
			$this->phpmailer->AddAddress($receiver_email, $receiver_name);

			$this->phpmailer->SetFrom($sender_email, $sender_name);

			$this->phpmailer->Subject  =  $sender_subject;

			$this->phpmailer->Body = $sender_message;

			if(!$this->phpmailer->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $this->phpmailer->ErrorInfo;
			} else {
				echo 'Message has been sent';
			}
		} catch (phpmailerException $e) {
			echo $e->errorMessage(); 
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	 }
	}
?>	