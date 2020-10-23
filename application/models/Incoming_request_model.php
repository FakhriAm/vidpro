<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Incoming_request_model extends CI_Model {
 
    var $table = 'request_transaction';
  //  var $column_order = array('id_video',null,null,'journalist','description','tag','uploader','uploaded_date',null);
    var $column_search = array('video_title','description','journalist','tag');
  //  var $order = array('video_meta.id_video' => 'desc');
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // public function get_datatables_inrequest(){
      
    //     $n= $this->session->userdata('company');
	// 	$this->db->select('*,video_source.content as source');
    //     $this->db->from('request_transaction');
    //     $this->db->join('video_source','request_transaction.from = video_source.id');
    //     $this->db->where('request_transaction.send_to',$n);
    //     $this->db->where('request_transaction.link',null);
    //     $this->db->order_by("request_date", "desc");
    //     return $this->db->get()->result();

    // }


    private function _query(){
        $n= $this->session->userdata('company');
		$this->db->select('*,video_source.content as source');
        $this->db->from($this->table);
        $this->db->join('video_source','request_transaction.from = video_source.id');
        $this->db->where('request_transaction.send_to',$n);
        $this->db->where('request_transaction.link',null);
        $this->db->order_by("request_date", "desc");
    }
	private function _get_datatables_query(){
        $this->_query();
        $i = 0;
        foreach ($this->column_search as $item){
            if($_POST['search']['value']){ 
                if($i===0){
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else $this->db->or_like($item, $_POST['search']['value']);
                if(count($this->column_search) - 1 == $i) $this->db->group_end();
            }
            $i++;
        }
        if(isset($_POST['order'])) $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        } 
    }
	
	public function get_datatables_inrequest(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        return $this->db->get()->result();
    }



    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function count_filtered(){
        $this->_get_datatables_query();
        return $this->db->get()->num_rows();
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
}
?>  