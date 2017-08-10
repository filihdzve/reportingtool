<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
class Login extends CI_Controller {

public function __construct() {
parent::__construct();
$this->load->model('user','',TRUE);
// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load database
//$this->load->model('login_database');
}
	public function index()
	{
		if(isset($_POST['login']))
		{
			$this->form_validation->set_rules('email','Email','required|valid_email');	
			$this->form_validation->set_rules('password','Password','required');	
			if($this->form_validation->run() == TRUE)
			{
				$data= array('USER_EMAIL' => $this->input->post('email'),'USER_PASSWORD' => $this->input->post('password'));
				
				//validates account in model
				$result = $this->user->login($data);
				if($result === 1)
				{
					echo "bien";
					
					/*
	   				$this->session->set_flashdata("success","The user has been registered. You can login now.");
	   				redirect("register","refresh");*/
	   			}
	   			else
	   			{	   			
	   				echo "mal";
	   				/*	
	   				$this->session->set_flashdata("failed","The email already exists. Try again.");
	   				redirect("register","refresh");*/
	   			}
			}
		}
		$this->load->view('login_view');
	}
	
}
