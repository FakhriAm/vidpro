<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	
	private $user_menu = array();
	private $user_name = '';
	
	public function __construct(){
		parent::__construct();
		$this->load->model('my_model','auth');
		if(!$this->session->userdata("login") || $this->session->userdata("login") != TRUE || $this->session->userdata("id_group") == null || $this->session->userdata("id") == null || $this->session->userdata("token_login") == null || !$this->auth->check_group($this->session->userdata("id_group")) || !$this->auth->check_user($this->session->userdata("id"),$this->session->userdata("id_group"),$this->session->userdata("token_login")) ) redirect('auth/logout');
		else{
			$this->getUserAuth();
			$class = $this->get_class_validation($this->router->class); 
			if(!$class) redirect('auth/page404');
		} 
	}

	public function getUserAuth(){
		$data = $this->auth->get_group_menu($this->session->userdata("id_group"));
		if(sizeof($data) > 0){
			foreach($data as $result) $this->user_menu[] = $result;
				
		} 
		else redirect('auth/logout');
	}

	public function getAllUserMenu(){
		return $this->user_menu;
	}

	public function get_class_validation($class){
		$menu = $this->getAllUserMenu();
		$result = $this->auth->get_controller_by_name($class);
		if(empty($result)|| is_null($result)) return FALSE;
		else{
			foreach ($menu as $row) {
				if($row->id == $result) return $result;
			}
			return FALSE;
		}	
	}
}
?>