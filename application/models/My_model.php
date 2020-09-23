<?php defined('BASEPATH') OR exit('No direct script access allowed');
class My_model extends CI_Model{

	public function __construct(){
		parent::__construct();
        $this->load->database();
	}

	public function check_group($id_group){
		$this->db->from('groups');
		$this->db->where('id',$id_group);
		$this->db->where('active',1);
		if($this->db->get()->num_rows() == 1) return true;
		else return false; 
	}

	public function check_user($id,$id_group,$token_login){
		$this->db->from('users');
		$this->db->where('id',$id);
		$this->db->where('token_login',$token_login);
		$this->db->where('id_group',$id_group);
		$this->db->where('active',1);
		if($this->db->get()->num_rows() == 1) return true;
		else return false; 
	}

	public function get_group_menu($id_group){
		$this->db->from('groups_auth');
		$this->db->join('menu','groups_auth.id_menu = menu.id');
		$this->db->where('groups_auth.id_group',$id_group);
		$this->db->where('groups_auth.active',1);
		$this->db->order_by('id_menu','asc');
		return $this->db->get()->result();
	}

	public function get_controller_by_name($content){
		$this->db->from('menu');
		$this->db->like('link', $content);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			$result = $query->row();
			return $result->id;	
		} else return null;
	}
}
?>