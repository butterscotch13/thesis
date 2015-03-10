<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_login extends CI_Controller {
    function index() {
        $this->load->helper(array('form','html'));
        $this->load->view('v_login'); //load view for login
    }
}
/* End of file c_login.php */
/* Location: ./application/controllers/c_login.php */