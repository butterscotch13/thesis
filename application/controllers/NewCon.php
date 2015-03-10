<?php

class NewCon extends CI_Controller {
	
	public function __construct()
     {
          parent::__construct();
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->library('form_validation');
         $this->load->model('Umodel');


     }

  public function index()
  {
    $this->load->view('layout/navbar');
	  $this->load->view('studentlogin');

  }

	public function home()
  {
		$this->load->view('layout/navbar');
		$this->load->view('pages/landingpage');
		//$this->load->view('home');
	}

  public function email()
  {
    $this->load->view('layout/navbar');
    $this->load->view('pages/email');
  }

  public function p_home()
  {
    $this->load->view('layout/navbar');
    $this->load->view('pages/parentlogin');
    //$this->load->view('home');
  }


	public function student_login()
  {

    //get the posted values
    $studentid = $this->input->post("studentid");
    $password = md5($this->input->post("password"));

    //set validations
    $this->form_validation->set_rules("studentid", "Studentid", "trim|required");
    $this->form_validation->set_rules("password", "Password", "trim|required");

      if ($this->form_validation->run() == FALSE)
      {
        //validation fails
        $this->load->view('layout/navbar');
        $this->load->view('studentlogin');
        $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
       //redirect('NewCon/index');
      }

      else
      {
        //validation succeeds
        if ($this->input->post('btn_login') == "Submit")
        {
            //check if username and password is correct
            $usr_result = $this->Umodel->student_login($studentid, $password);
            if ($usr_result !=0) //active user record is present
            {
                 // Set session data.
                  $this->session->set_userdata('studentid', $studentid);
                  $this->session->set_userdata('password', $password);
                
                 // Redirect.
                  redirect('NewCon/getProfile');
            }
            else
            {
                 $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid Student ID or password!</div>');
                 redirect('NewCon/index');
            }
       }
       else
       {
            redirect('NewCon/index');
       }
      }
	}

  public function parent_login()
  {

    //get the posted values
    $p_name = $this->input->post("p_name");
    $password = $this->input->post("password");

    //set validations
    $this->form_validation->set_rules("p_name", "Enter Fullname", "trim|required");
    $this->form_validation->set_rules("password", "Password", "trim|required");

      if ($this->form_validation->run() == FALSE)
      {
        //validation fails
        $this->load->view('layout/navbar');
        $this->load->view('pages/parentlogin',$data);
        //$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
       //redirect('NewCon/index');
      }

      else
      {
        //validation succeeds
        if ($this->input->post('btn_login') == "Submit")
        {
            //check if username and password is correct
            $usr_result = $this->Umodel->parent_login($p_name, $password);
            if ($usr_result !=0) //active user record is present
            {
                 // Set session data.
                  $this->session->set_userdata('p_name', $p_name);
                  $this->session->set_userdata('password', $password);
                
                 // Redirect.
                  //redirect('NewCon/getProfile');
                  echo "Hello";
            }
            else
            {
                 $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid Student ID or Password!</div>');
                 redirect('NewCon/p_home');
            }
       }
       else
       {
            redirect('NewCon/index');
       }
      }
  }

  public function getProfile()
  {
    $studentid = $this->session->userdata('studentid');
    $data['studentid'] = $studentid;
    $this->load->view('layout/navbar');
    //$this->load->view('layout/sidebar');
    
    $this->load->model('Umodel');
    $data['result'] = $this->Umodel->result_getProfile($studentid); 
    //$this->load->view('layout/navbar2', $data);
    $this->load->view('pages/profile', $data);
    $this->load->view('layout/footer_student');

  }

  public function changePass()
  {
    $this->load->view('layout/navbar');
    $this->load->view('pages/changepass');
    $studentid = $this->session->userdata('studentid');
    $data['studentid'] = $studentid;

    
    //validation succeeds
       if ($this->input->post('btn_login') == "Update Password")
       {
        $oldpass = md5($this->input->post("oldpass"));
        $newpass = md5($this->input->post("newpass"));
        $cpass = md5($this->input->post("cpass"));
          //set validations
          $this->form_validation->set_rules("oldpass", "Old Password", "trim|required");
          $this->form_validation->set_rules("newpass", "New Password", "trim|required");
          $this->form_validation->set_rules("cpass","Confirm Password","required|trim|matches[newpass]");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Something is wrong here.</div>');

          }
          else
          {
            //check if username and password is correct
              $usr_result = $this->Umodel->result_getChangePass($studentid,$oldpass,$newpass);
              if ($usr_result) //active user record is present
              {
                // Redirect.
                 redirect('NewCon/getProfile');
              }
              else
              {
                  echo "Error";
                   //$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Something is wrong here./div>');
                   //redirect('NewCon/index');
              }
          }   
        }
        $this->load->view('layout/footer_student');

  }

  public function getEditProfile()
  {
    $studentid = $this->session->userdata('studentid');
    $data['studentid'] = $studentid;
    $this->load->view('layout/navbar');
    
    
    $this->load->model('Umodel');
    $data['result'] = $this->Umodel->result_getProfile($studentid); 
    $this->load->view('pages/editprof', $data);
    $this->load->view('layout/footer_student');


    if ($this->input->post('btn_edit') == "Save")
    {
      $daddress = $this->input->post('daddress');

      //set validations
          $this->form_validation->set_rules("daddress", "Current Address", "trim|required");
          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('pages/editprof');
          }
          else
          {
            //check if username and password is correct
              $usr_result = $this->Umodel->result_getEditProfile($studentid,$daddress);
              if ($usr_result) //active user record is present
              {
                // Redirect.
                 redirect('NewCon/getProfile');
              }
              else
              {
                  echo "Naay sayop";
              }
          }   

    }
  }

  public function getClearance()
  {
    $studentid = $this->session->userdata('studentid');
    $data['studentid'] = $studentid;
    $this->load->view('layout/navbar');
    //$this->load->view('layout/sidebar');

    $this->load->model('Umodel');
    $data['res'] = $this->Umodel->result_getClearance($studentid); 
     $this->load->view('pages/clearance', $data);
    $this->load->view('layout/footer_student');

  }

  public function getGrades()
  {
		$studentid = $this->session->userdata('studentid');
    $data['studentid'] = $studentid;
		$this->load->view('layout/navbar');

		$this->load->model('Umodel');
		$data['result'] = $this->Umodel->result_getGrades($studentid); 
	   $this->load->view('pages/grades', $data);
    $this->load->view('layout/footer_student');

	}

	public function getSchedule()
  {
		$studentid = $this->session->userdata('studentid');
    $data['studentid'] = $studentid;
		$this->load->view('layout/navbar');
		//$this->load->view('layout/sidebar');
		$this->load->model('Umodel');
		$data['query'] = $this->Umodel->result_getSchedule($studentid); 
	   $this->load->view('pages/schedule', $data);
    $this->load->view('layout/footer_student');

	}

	public function checkadreq()
  {
		$studentid = $this->session->userdata('studentid');
    $data['studentid'] = $studentid;
 		$this->load->view('layout/navbar');
		//$this->load->view('layout/sidebar');
		$this->load->model('Umodel');
		$data['query'] = $this->Umodel->result_getAddreq($studentid);
    $this->load->view('pages/adreq', $data);
    $this->load->view('layout/footer_student');
	}

  public function getInc()
  {
    $studentid = $this->session->userdata('studentid');
    $data['studentid'] = $studentid;
    $this->load->view('layout/navbar');
    //$this->load->view('layout/sidebar');
    $this->load->model('Umodel');
    $data['query'] = $this->Umodel->result_getInc($studentid);
    $this->load->view('pages/inc', $data);
    $this->load->view('layout/footer_student');

  }

  public function getAssessment()
  {
    $this->load->view('layout/navbar');
    $studentid = $this->session->userdata('studentid');
    $data['studentid'] = $studentid;
    $this->load->model('Umodel');
    $data['query'] = $this->Umodel->result_getAssessment($studentid);
     $data['totalAssessment'] = $this->Umodel->result_totalAssessment($studentid);
     $data['totalMiscfee'] = $this->Umodel->result_miscfee($studentid);
     $data['totalTuition'] = $this->Umodel->result_getTuition($studentid);
    $this->load->view('pages/assessment', $data);

    $this->load->view('layout/footer_student');

  }

	public function logout()
  {
    //remove all session data
    $this->session->unset_userdata('studentid');
    $this->session->sess_destroy();
    redirect('NewCon/home');
  }
}

?>