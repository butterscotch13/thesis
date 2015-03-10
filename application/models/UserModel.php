<?php

class UserModel extends CI_Model {

	function __construct() {
        parent::__construct();
        $this->load->database();
    }

	function login($studentid, $pass){

		$this->db->select('studentid','password');
		$this->db->from('users');
		$this->db->where('studentid',$studentid);
		$this->db->where('password',md5($pass));
		

		$query = $this->db->get();

		if($query->num_rows()==1){
			return $query->result();
		}
		else{
			return false;
		}
	}

	function result_getGrades()
	{
	      $this->db->select('grades.blockcode,subjectblocking.subjectcode,subjects.description,grades.final');
	      $this->db->from('grades');
	      $this->db->join('subjectblocking','grades.blockcode=subjectblocking.blockcode');
	      $this->db->join('subjects','subjectblocking.subjectcode=subjects.subjectcode');
	      $this->db->where('studentid','2010-F0767');
	      $query=$this->db->get();
	      return $query->result();
	    
	}

    function result_getSchedule()

	{
		$this->db->select('grades.studentid,grades.blockcode, subjectblocking.subjectcode,subjectblocking.daystart,subjectblocking.dayend, subjectblocking.stime,subjectblocking.sday,instructorinfo.firstname,instructorinfo.lastname, subjectblocking.roomcode,room.building');
		$this->db->from('grades');
	    $this->db->join('subjectblocking', 'grades.blockcode=subjectblocking.blockcode');
        $this->db->join('instructorinfo', 'subjectblocking.instructorid=instructorinfo.instructorid');
        $this->db->join('room','subjectblocking.roomcode=room.roomcode');
        $this->db->distinct();
	    $this->db->where('studentid', '2013-F0218');
	    $this->db->where('sem', '1');
        $this->db->where('sy', '2013-2014');
	    $query=$this->db->get();
	    return $query->result();
	}

	function result_getAddreq()

	{
		$this->db->select('studentid, lastname, firstname,middlename,hscard, tor,dismissal,goodmoral,bcrtfcate, form137, grade_evaluation');
		$this->db->from('studentinfo');
	    $this->db->where('studentid', '2013-F0218');
	    $query=$this->db->get();
	    return $query->result();
	}

	function result_getAssessment()

	{
		$this->db->select('register.regnum,register.studentid,accountspayable.accountno,accountspayable.accounttype,accountspayable.amount');
		$this->db->from('accountspayable');
	    $this->db->join('register', 'accountspayable.regnum = register.regnum');
	    $this->db->where('accountspayable.regnum','15459');
	    $query=$this->db->get();
	    return $query->result();
	    
	}

		function result_getInc()

	{
		$this->db->select('grades.studentid,subjectblocking.subjectcode,subjects.description,grades.blockcode,grades.final,grades.remark,subjectblocking.sem,subjectblocking.sy');
		$this->db->from('grades');
	    $this->db->join('subjectblocking', 'grades.blockcode = subjectblocking.blockcode');
	    $this->db->join('subjects', 'subjectblocking.subjectcode = subjects.subjectcode');
	    $this->db->where('grades.studentid', '2013-F0218');
	    $this->db->where('final', 'INC');
	    $query=$this->db->get();
	    return $query->result();
	}
}
?>