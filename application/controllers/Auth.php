<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('auth_model','auth');
	}

	public function index(){
		$this->load->view('auth/login3');
	}

	public function login(){
		$this->form_validation->set_rules('nik','nik','trim|required|is_natural');
        $this->form_validation->set_rules('pass','password','trim|required');
        if ($this->form_validation->run() == FALSE) echo json_encode(array('status'=>false,'message'=>validation_errors()));
        else echo json_encode($this->auth->login($this->input->post('nik'),$this->input->post('pass')));
	}

	public function logout(){
		$this->auth->logout();
	    redirect('auth','refresh');
	}

	public function page404(){
		$this->load->view('errors/error_404');
	}
}