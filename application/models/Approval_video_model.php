<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Approval_video_model extends CI_Model {
 
    var $table = 'video_meta';
    var $column_order = array('id_video',null,null,'journalist','description','tag','uploader','uploaded_date',null);
    var $column_search = array('video_title','description','journalist','tag');
    var $order = array('video_meta.id_video' => 'desc');
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    private function _query(){
        $this->db->select('video_meta.*,CONCAT(users.first_name," ",users.last_name) as uploader, video_type.content as type, video_price.content as price,CONCAT(pricer.first_name," ",pricer.last_name) as pricer');
        $this->db->from($this->table);
        $this->db->join('users','video_meta.uploader = users.id');
        $this->db->join('video_type','video_meta.id_video_type = video_type.id');
        $this->db->join('video_price','video_meta.id_video_price = video_price.id');
        $this->db->join('users pricer','video_meta.uploader = pricer.id');
        $this->db->where('id_status',2);
        $this->db->where('video_meta.active',1);
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
    
    public function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        return $this->db->get()->result();
    }
    
    public function count_filtered(){
        $this->_get_datatables_query();
        return $this->db->get()->num_rows();
    }
 
    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function update($data, $where){
        $this->db->update($this->table, $data, $where);
    }
}
?>  