  <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_test extends CI_Model 
{
 
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
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

	/*function result_getSchedule()

	{
		$this->db->select('grades.studentid', 'grades.blockcode', 'subjectblocking.subjectcode','subjectblocking.daystart','subjectblocking.dayend', 'subjectblocking.stime','subjectblocking.sday','instructorinfo.firstname', 'instructorinfo.lastname', 'subjectblocking.roomcode','room.building');
	    $this->db->join('subjectblocking', 'grades.blockcode=subjectblocking.blockcode');
        $this->db->join('instructorinfo', 'subjectblocking.instructorid=instructorinfo.instructorid');
        $this->db->join('room', 'subjectblocking.roomcode= room.roomcode');
	    $this->db->where('studentid', '2013-F0218');
	    $query=$this->db->get();
	    return $query->result();
	}*/

}