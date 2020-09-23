<?php defined('BASEPATH') OR exit('No direct script access allowed');
class History_upload_model extends CI_Model {
 
    var $table = 'video_meta';
    var $column_order = array('id_video',null,null,'journalist','description','tag','uploader','uploaded_date',null);
    var $column_search = array('video_title','description','journalist','tag');
    var $order = array('video_meta.id_video' => 'desc');
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    private function _query(){
        $this->db->select('video_meta.*,CONCAT(users.first_name," ",users.last_name) as uploader, video_category.content as category');
        $this->db->from($this->table);
        $this->db->join('users','video_meta.uploader = users.id');
        $this->db->join('video_category','video_meta.id_video_category = video_category.id');
        $this->db->where('id_status',1);
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

    public function get_by_id($id){ 
        $this->db->from($this->table);
        $this->db->where('id_video',$id);
        return $this->db->get()->row();
    }

    public function update($data, $where){
        $this->db->update($this->table, $data, $where);
    }

    public function delete_by_id($id){
        $this->db->where('id_video', $id);
        $this->db->delete($this->table);
    }

    public function get_list_video_category(){
        $this->db->select('id,content');
        $this->db->from('video_category');
        $result = $this->db->get()->result();
        $lists = array();
        foreach ($result as $row) $lists[$row->id] = $row->content; 
        return $lists;
    }
}
?>  