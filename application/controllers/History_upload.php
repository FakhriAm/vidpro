<?php defined('BASEPATH') OR exit('No direct script access allowed');
class History_upload extends MY_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('history_upload_model', 'history');
    }

	public function index(){
        $lists = $this->history->get_list_video_category();
        $opt = array(0 => 'Select Category');
        foreach ($lists as $key => $value) $opt[$key] = $value;
		$this->load->view('part/default/wrapper',array('content'=>'upload_video_history/upload_video_history_view','content_js'=>'upload_video_history/upload_video_history_js','menu'=>$this->getAllUserMenu(),'filter_category'=>form_dropdown('',$opt,'','name="id_video_category" class="form-control"')));
	}

	public function ajax_list(){
        $list = $this->history->get_datatables();
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
        echo json_encode(array("draw" => $_POST['draw'],"recordsTotal" => $this->history->count_all(),"recordsFiltered" => $this->history->count_filtered(),"data" => $data));
    }

    public function ajax_get_detail(){
    	$this->form_validation->set_rules('id','ID','trim|required|is_natural_no_zero');
    	if($this->form_validation->run()===FALSE) echo json_encode(array("status" => FALSE,"message" => validation_errors()));
		else echo json_encode(array("status" => true, 'row'=>$this->history->get_by_id($this->input->post('id'))));
    }

    public function ajax_edit(){
    	$this->form_validation->set_rules('id','ID','trim|required|is_natural_no_zero');
	    $this->form_validation->set_rules('videotitle','video title','trim|required|max_length[50]');
	    $this->form_validation->set_rules('journo','journalist','trim|required|max_length[50]');
	    $this->form_validation->set_rules('desc','description','trim|required|max_length[50]');
        $this->form_validation->set_rules('tag','tag','trim|required');
        $this->form_validation->set_rules('id_video_category','video category','trim|required|is_natural_no_zero');
        $this->form_validation->set_rules('hour','duration hour','trim|required|is_natural|less_than[100]');
        $this->form_validation->set_rules('minute','duration minute','trim|required|is_natural|less_than[60]');
        $this->form_validation->set_rules('second','duration second','trim|required|is_natural|less_than[60]');
	    if($this->form_validation->run()===FALSE) echo json_encode(array("status" => FALSE,"message" => validation_errors()));	
		else{
            $this->history->update(array('video_title'=>strip_tags($this->input->post('videotitle')),'journalist'=>strip_tags($this->input->post('journo')),'description'=>strip_tags($this->input->post('desc')),'tag'=>strip_tags($this->input->post('tag')),'id_video_category'=>$this->input->post('id_video_category'),'duration'=>$this->generateDuration($this->input->post('hour'),$this->input->post('minute'),$this->input->post('second'))),array('id_video'=>$this->input->post('id')));
            echo json_encode(array("status" => true));
	    }
	}

	public function ajax_delete(){
    	$this->form_validation->set_rules('id','ID','trim|required|is_natural_no_zero');
    	if($this->form_validation->run()===FALSE) echo json_encode(array("status" => FALSE,"message" => validation_errors()));
		else{
            $this->history->update(array('active'=>0),array('id_video'=>$this->input->post('id')));
            echo json_encode(array("status" => true));
	    }
	}

    public function generateDuration($hour,$minute,$second){
        if($second < 10) $second = "0".$second;
        if($minute < 10) $minute = "0".$minute;
        if($hour < 10) $hour = "0".$hour;
        return $hour.":".$minute.":".$second;
    }
}