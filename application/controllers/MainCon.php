<?php

class MainCon extends CI_Controller {

	
	public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          //load the login model
         $this->load->model('UserModel');


     }

	public function index(){
		$this->load->view('layout/navbar');
		$this->load->view('login');

		
	}

	public function home(){
		$this->load->view('layout/navbar');

		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['studentid'] = $session_data['studentid'];
            $data['id'] = $session_data['id'];
            $this->load->view('home', $data);
        } else {
        //If no session, redirect to login page
            redirect('index', 'refresh');
        }	
	}

	public function checkLogin(){

		$this->form_validation->set_rules('studentid','Student ID','required');
		$this->form_validation->set_rules('password','Password','required|callback_checkLogin');
		$this->load->model('UserModel');

		if($this->form_validation->run()==false){
			$this->load->view('login');
		}
		else{
			
      $studentid=$this->input->post('studentid');
      $pass=$this->input->post('password');

			$result = $this->UserModel->login($studentid,$pass);

			if($result){
				$sess_array = array();
             foreach($result as $row) {
                 //create the session
                 $sess_array = array('id' => $row->id,
                     'studentid' => $row->studentid);
                 //set session with value from database
                 $this->session->set_userdata('logged_in', $sess_array);
                 }
			redirect('MainCon/home');
			}
			else{
			$this->form_validation->get_message('checkLogin','Incorrect Username or Password');
			return false;
			}

			
			//echo "Hello";
		}
	}

	public function logout() {
		         //remove all session data
		         $this->session->unset_userdata('logged_in');
		         $this->session->sess_destroy();
		         redirect(base_url('MainCon/index'), 'refresh');
		     }
	

	public function checkaddreq(){

 		$this->load->view('layout/navbar');
		$this->load->model('UserModel');
		$data['query'] = $this->UserModel->result_getAddreq();
    $this->load->view('pages/addreq', $data);

	}

	public function getGrades() {
		$this->load->view('layout/navbar');
		$this->load->model('UserModel');
		$data['query'] = $this->UserModel->result_getGrades(); 
	   $this->load->view('pages/grades', $data);
	}


	 

}