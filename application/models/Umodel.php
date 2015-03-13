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

					WHERE g.studentid='$studentid'
					ORDER BY sy,sem;
					";
			$result = $this->db->query($sql);
			$grades = $result->result();
			return $grades;
	    
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
				AND sb.sy=(select max(sy) from subjectblocking sb JOIN grades g ON g.blockcode=sb.blockcode WHERE g.studentid='$studentid')
				AND sb.sem=(select max(sem) from subjectblocking sb JOIN grades g ON g.blockcode=sb.blockcode WHERE g.studentid='$studentid')
				)
				+
					(select miscfee from assessment ass
					JOIN register rg ON ass.regnum=rg.regnum
					WHERE rg.studentid='$studentid'
						AND sy=(select max(sy) from register rg JOIN grades g ON g.studentid=rg.studentid WHERE g.studentid='$studentid')
						AND sem=(select max(sem) from register rg JOIN grades g ON g.studentid=rg.studentid WHERE g.studentid='$studentid')
					)
				)as total_tuition
			";
			$result = $this->db->query($sql);
			$totalTuition = $result->result();
			return $totalTuition;
	}

	function result_totalAssessment($studentid)
	{
		$sql=
			"
			SELECT sum(s.numofunit) total_units, sum(s.price) total_tuition FROM subjects s
			INNER JOIN subjectblocking sb ON s.subjectcode=sb.subjectcode
			INNER JOIN grades g ON sb.blockcode=g.blockcode
			INNER JOIN register reg ON g.studentid=reg.studentid
			WHERE g.studentid='2010-F0767'
			AND sb.sem = (SELECT max(sem) from register WHERE sy = (SELECT max(sy) from register))
			AND sb.sy = (SELECT max(sy) from register WHERE sem=(SELECT max(sem) from register))
			;
			";

			$result = $this->db->query($sql);
			$totalAssessment = $result->result();
			return $totalAssessment;	
	}

	
	}
?>	