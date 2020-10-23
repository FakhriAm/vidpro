<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Video_model extends CI_Model {

    public function __construct(){
        parent::__construct();
	//$this->load->database();
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

    public function get_video_source(){
        $this->db->select('id,content');
        $this->db->from('video_source');
        $this->db->where('activate_',1);
        return $this->db->get()->result();
    }


    public function get_video_category(){
        $this->db->select('id,content');
        $this->db->from('video_category');
        $this->db->where('active',1);
        return $this->db->get()->result();
    }


    public function get_video_type(){
	$this->db->select('id,content');
        $this->db->from('video_type');
        $this->db->where('active',1);
        return $this->db->get()->result();
    }

    public function check_video_type($name){
	$this->db->from('video_type');
        $this->db->where('active',1);
        $this->db->where('LOWER(content)',strtolower($name));
        $query = $this->db->get();
        if($query->num_rows() == 1) return $query->row();
        else return false;
    }

    public function check_video_category(){
        $this->db->from('video_category');
        $this->db->where('active',1);
        $query = $this->db->get();
        if($query->num_rows() == 1) return $query->row();
        else return false;
    }
	
    public function check_video_source($name){
        $this->db->from('video_source');
        $this->db->where('activate_',1);
        $this->db->where('content_links',$name);
        $query = $this->db->get();
        if($query->num_rows() == 1) return $query->row();
        else return false;
    }

    public function get_video_query(){
        /*$this->db->select('video_meta.*,video_price.content as price, video_category.content as category, video_type.content as type');
        $this->db->from('video_meta');
        $this->db->join('video_price','video_meta.id_video_price = video_price.id');
        $this->db->join('video_category','video_meta.id_video_category = video_category.id');
        $this->db->join('video_type','video_meta.id_video_type = video_type.id');
        $this->db->where('id_status',3);
        $this->db->where('video_meta.active',1);  */

        $this->db->select('video_meta.*,video_price.content as price,  video_type.content as type, users.first_name, users.last_name,deskripsi_company,video_source.company_img');
        $this->db->from('video_meta');
        $this->db->join('users','video_meta.uploader = users.id','left');
        $this->db->join('video_price','video_meta.id_video_price = video_price.id','left');
        $this->db->join('video_source','video_meta.id_video_source = video_source.id','left');
        $this->db->join('video_type','video_meta.id_video_type = video_type.id','left');
        $this->db->where('video_meta.active',1);  
    }

    public function get_video_by_category_id($id){
        $this->get_video_query();
        // $this->db->where('id_video_category',$id);
        $query = $this->db->get();
        if($query->num_rows() > 0) return $query->result();
        else return array();
    }
    public function get_video_by_source_id($id){
        $this->get_video_query();
        $this->db->where('id_video_source',$id);
        $query = $this->db->get();
        if($query->num_rows() > 0) return $query->result();
        else return array();
    }
	public function get_latest_video(){
		$this->get_video_query();
		$this->db->order_by('uploaded_date','DESC');
		$query = $this->db->get();
        if($query->num_rows() > 0) return $query->result();
        else return array();
	}

	public function get_latest_video(){
		$this->get_video_query();
		$this->db->order_by('uploaded_date','DESC');
		$query = $this->db->get();
        if($query->num_rows() > 0) return $query->result();
        else return array();
	}

    public function get_video_by_type_id($id){
        $this->get_video_query();
        $this->db->where('id_video_type',$id);
        $query = $this->db->get();
        if($query->num_rows() > 0) return $query->result();
        else return array();
    }

    public function get_video_by_id($id){
        $this->get_video_query();
        $this->db->where('id_video',$id);
        $query = $this->db->get();
        if($query->num_rows() == 1) return $query->row();
        else return false;
    }

    public function search_video($query){
        $this->get_video_query();
        $this->db->where('video_title like "%'.$query.'%"');
        $this->db->or_where('description like "%'.$query.'%"');
        $this->db->or_where('tag like "%'.$query.'%"');
        return $this->db->get()->result();
    }
}
