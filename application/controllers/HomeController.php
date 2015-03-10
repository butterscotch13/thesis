<?php

class HomeController extends CI_Controller {
	
	public function index(){
		$this->load->view('home');
	}

	public function checkLogin(){
		$this->form_validation->set_rules('name_admin','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()==false){
			$this->load->view('login');
		}
	}

	 

}