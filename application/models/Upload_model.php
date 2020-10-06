<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Upload_model extends CI_Model {

	var $table = 'video_meta';
	var $tables = 'thumbnail_meta';

	public function __construct(){
		parent::__construct();
	}

	public function get_list_video_category(){
		$this->db->select('id,content');
        $this->db->from('video_category');
         $this->db->where('active',1);
        $result = $this->db->get()->result();
		$lists = array();
        foreach ($result as $row) $lists[$row->id] = $row->content;	
        return $lists;
	}
	public function get_list_video_source(){
		$this->db->select('id,content');
        $this->db->from('video_source');
        $this->db->where('active',1);
        $result = $this->db->get()->result();
		$lists = array();
        foreach ($result as $row) $lists[$row->id] = $row->content;	
        return $lists;
	}

	public function save($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
}