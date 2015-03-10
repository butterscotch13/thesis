<?php 

class LoginT extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        //$this->load->helper('html');
        //$this->load->database();
        $this->load->library('form_validation');
        //load the login model
        $this->load->model('Umodel');
	}

	public function index(){
		$this->load->view('layout/navbar');
		$this->load->view('login1');
	}

	public function home(){
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('home');
		
	}

	public function login(){
		$this->load->model('login_model');
		//get the posted values
          $studentid = $this->input->post("studentid");
          $password = md5($this->input->post("password"));

          //set validations
          $this->form_validation->set_rules("studentid", "Studentid", "trim|required");
          $this->form_validation->set_rules("password", "Password", "trim|md5|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('login1');
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_login') == "Login")
               {
                    //check if username and password is correct
                    $usr_result = $this->login_model->get_user($studentid, $password);
                    if ($usr_result > 0) //active user record is present
                    {
                         // Set session data.
    					$this->session->set_userdata('studentid', $studentid);
    					$this->session->set_userdata('password', $password);

    					// Redirect.
    					redirect('LoginT/home');
                    }
                    else
                    {
                         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                         redirect('LoginT/index');
                    }
               }
               else
               {
                    redirect('LoginT/index');
               }
          }
	}

}

?>