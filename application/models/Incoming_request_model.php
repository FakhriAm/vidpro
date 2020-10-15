<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Incoming_request_model extends CI_Model {
 
    var $table = 'request_transaction';
    var $column_order = array('id_video',null,null,'journalist','description','tag','uploader','uploaded_date',null);
    var $column_search = array('video_title','description','journalist','tag');
    var $order = array('video_meta.id_video' => 'desc');
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_datatables_inrequest(){
      
        $n= $this->session->userdata('company');
		$this->db->select('*,video_source.content as source');
        $this->db->from('request_transaction');
        $this->db->join('video_source','request_transaction.from = video_source.id');
        $this->db->where('request_transaction.send_to',$n);
        // $this->db->where('request_transaction.link',null);

        $this->db->order_by("request_date", "desc");
        return $this->db->get()->result();

    }

    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
	
    public function request_finished($data, $where){
        $this->db->update($this->table, $data, $where);
    }
		
     public function get_by_id($id){ 
        $this->db->from($this->table);
        $this->db->where('id_video',$id);
        return $this->db->get()->row();
    }
      public function update($data, $where){
        $this->db->update($this->table, $data, $where);
    }

    public function update_link_not_found(){
        $this->db->update($this->table, $data, $where);
    }
}
?>  