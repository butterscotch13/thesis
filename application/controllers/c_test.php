 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_test extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_test');
    }
 function getGrades() {
	   $data['query'] = $this->m_test->result_getGrades(); 
	   $this->load->view('v_display', $data);
	}

 function getSchedule() {
 	   $data['query'] = $this->m_test->result_getSchedule();
 	   $this->load->view('v_schedule',$data);
 }
}
