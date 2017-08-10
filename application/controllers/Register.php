<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
class Register extends CI_Controller {

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
		
		
		if(isset($_POST['register']))
		{
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('lastName','Last Name','required');		
			$this->form_validation->set_rules('email','Email','required|valid_email');	
			$this->form_validation->set_rules('password','Password','required|min_length[5]');	
			$this->form_validation->set_rules('password2','Confirm Password','required|min_length[5]|matches[password]');	

			if($this->form_validation->run() == TRUE)
			{

				$data= array('USER_EMAIL' => $this->input->post('email'));
				//checks if the email doesn't exist
				$result = $this->user->check($data);
				if($result === 1)
				{
					
					//calls the model, insert
					$data= array(
							'USER_ID' => null,
							'USER_NAME' => $this->input->post('name'),
							'USER_LAST_NAME' => $this->input->post('lastName'),
							'USER_EMAIL' => $this->input->post('email'),
							'USER_PASSWORD' => $this->input->post('password'),
							'USER_ROLE' => 2,
							'USER_INITIALS' =>'cs',
							'USER_STATUS' => 1,
							'USER_CREATED_ON' => date('Y-m-d H:i:s'),
	    					'USER_UPDATED_ON' => date('Y-m-d H:i:s')
						);
					
	   				$result = $this->user->insert($data);

	   				$this->session->set_flashdata("success","The user has been registered. You can login now.");
	   				redirect("register","refresh");
	   			}
	   			else
	   			{	   				
	   				$this->session->set_flashdata("failed","The email has been already registered. Try again.");
	   				redirect("register","refresh");
	   			}
			}
		}
		$this->load->view('register');
	}
	
}
