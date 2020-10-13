<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Incoming_request extends MY_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Incoming_request_model', 'incoming');
    }

	public function index(){
        $lists = $this->incoming->get_list_video_category();
        $opt = array(0 => 'Select Category');
        foreach ($lists as $key => $value) $opt[$key] = $value;
		$this->load->view('part/default/wrapper',array('content'=>'incoming_request/incoming_request_view','content_js'=>'incoming_request/incoming_request_js','menu'=>$this->getAllUserMenu(),'filter_category'=>form_dropdown('',$opt,'','name="id_video_category" class="form-control"')));
	}

	public function ajax_list(){
        $list = $this->incoming->get_datatables();
        $data = array();
		$crs = "";
        $no = $_POST['start'];
        foreach ($list as $key){
        	$badge = '';
        	$arr_badge = explode(",", $key->tag);
        	if(sizeof($arr_badge) > 0) for ($i=0; $i < sizeof($arr_badge) ; $i++) $badge.='<span class="badge badge-info">'.$arr_badge[$i].'</span> ';
        	else $badge = '-';
            $data[] = array(++$no,'<img class="test" width="110" height="60" src="http://10.11.5.71/thumbnail/'.$key->id_thumbnail.'">',$key->video_title,$key->journalist,$key->description,$key->duration,$key->category,$badge,$key->uploader,$key->uploaded_date,'<button class="btn btn-warning btn-icon-split btn-sm" href="#" onclick="showModal('."'".$key->id_video."'".')"data-toggle="modal" data-target="#editModal"><span class="icon text-white"><i class="fas fa-edit"></i></span><span class="text"> Edit</span></button><button class="btn btn-danger btn-icon-split btn-sm" onclick="deleteData('."'".$key->id_video."'".')"><span class="icon text-white"><i class="fas fa-trash"></i></span><span class="text">Delete</span></button>');  
        } 
        echo json_encode(array("draw" => $_POST['draw'],"recordsTotal" => $this->incoming->count_all(),"recordsFiltered" => $this->history->count_filtered(),"data" => $data));
    }

    
}