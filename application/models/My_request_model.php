<?php defined('BASEPATH') OR exit('No direct script access allowed');
class My_request_model extends CI_Model {
 
    var $table = 'request_transaction';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
 
    
 
    public function get_list_company(){
		$this->db->select('content,id');
        $this->db->from('video_source');
        //$this->db->where('active_',1);
        $result = $this->db->get()->result();
		$lists = array();
        foreach ($result as $row) $lists[$row->id] = $row->content;	
        return $lists;
    }

    public function get_datatables_myrequest(){
        $n= $this->session->userdata('company');
		$this->db->select('*,video_source.content as source');
        $this->db->from('request_transaction');
        $this->db->join('video_source','request_transaction.send_to = video_source.id');
       
        $this->db->where('request_transaction.from',$n);
        $this->db->where('active_trn',1);
        $this->db->order_by("request_date", "desc");
        return $this->db->get()->result();

        

    }

    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // public function count_filtered(){
    //     $this->get_datatables_myrequest();
    //     return $this->db->get()->num_rows();
    // }
    
    public function save($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

}