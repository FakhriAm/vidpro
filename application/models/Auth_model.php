<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_Model{

	private $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
	public function __construct(){
		parent::__construct();
        $this->load->database();
	}

	public function login($nik,$password){
		$this->db->from('users');
		$this->db->where('nik',$nik);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			$user = $query->row();
			if($this->encryption->decrypt($user->password) == $password){
				if($user->active != 1) return array('status'=>false, 'message'=>'User not active, please contact IT for more information');
				else{
					do{
						$token_login = $this->generate_string($this->permitted_chars,100);
					} while (!$this->check_token($token_login));
					$this->db->update('users',array('token_login'=>$token_login,'last_login'=>date('Y-m-d h:i:s')),array('id'=>$user->id));
					$this->session->set_userdata(array("id" => $user->id,"id_group" => $user->id_group,'token_login'=>$token_login,"login" => TRUE,'name'=>$user->first_name." ".$user->last_name,"company" => $user->company));
					$url = '';
					if($user->id_group == 1 || $user->id_group == 2) $url = 'dashboard';
					else if($user->id_group == 3) $url = 'pricing_video';
					else if($user->id_group == 4) $url = 'approval_video';
					return array('status'=>true,'url'=>base_url($url));
				}
			} else return array('status'=>false, 'message'=>'Wrong combination NIK & password are found!');
		} else return array('status'=>false, 'message'=>'NIK not found!');
	}

	public function logout(){
		if($this->db->update('users',array('token_login'=>null),array('id'=>$this->session->userdata('id')))){
			$this->session->unset_userdata(array('id','id_group','login','token_login','name'));
	    	$this->session->sess_destroy();
	    	return true;
		} else return false;
	}

	public function check_token($token){
		$this->db->from('users');
		$this->db->where('token_login',$token);
		if($this->db->get()->num_rows()==0) return true;
		else return false;
	}

	private function generate_string($input, $strength = 16) {
	    $input_length = strlen($input);
	    $random_string = '';
	    for($i = 0; $i < $strength; $i++) {
	        $random_character = $input[mt_rand(0, $input_length - 1)];
	        $random_string .= $random_character;
	    }
	    return $random_string;
	}
}
?>