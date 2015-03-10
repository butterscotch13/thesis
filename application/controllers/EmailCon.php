<?php

class EmailCon extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->library('email');
		$this->email->from('leelai879@gmail.com','julie');
		$this->email->to('bulai879@gmail.com');
		$this->email->subject('TEST');
		$this->email->message('ako buday');

		if($this->email->send()){
			$data['msg'] = "email sent!";
		}
		else{
			$data['msg']="email not sent.";
		}
		$this->load->view('pages/email',$data);
	}

}
?>
