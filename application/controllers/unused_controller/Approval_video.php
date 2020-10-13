<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Approval_video extends MY_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('approval_video_model', 'approval');
    }

	public function index(){
		$this->load->view('part/default/wrapper',array('content'=>'approval_video/approval_video_view','content_js'=>'approval_video/approval_video_js','menu'=>$this->getAllUserMenu()));
	}

	public function ajax_list(){
        $list = $this->approval->get_datatables();
        $data = array();
		$crs = "";
        $no = $_POST['start'];
        foreach ($list as $key) $data[] = array(++$no,'<img class="test" width="110" height="60" src="http://10.11.5.71/thumbnail/'.$key->id_thumbnail.'">',$key->video_title,$key->description,'04:30',$key->uploader,$key->pricer,$key->type,"Rp ".number_format($key->price),'<button class="btn btn-success btn-icon-split btn-sm" onclick="approveData('.$key->id_video.')"><span class="icon text-white"><i class="fas fa-check"></i></span><span class="text">Approve</span></button><button class="btn btn-danger btn-icon-split btn-sm" onclick="rejectData('.$key->id_video.')"><span class="icon text-white"><i class="fas fa-check"></i></span><span class="text">Reject</span></button>');
        echo json_encode(array("draw" => $_POST['draw'],"recordsTotal" => $this->approval->count_all(),"recordsFiltered" => $this->approval->count_filtered(),"data" => $data));
    }

    public function ajax_approve(){
    	$this->form_validation->set_rules('id','ID','trim|required|is_natural_no_zero');
	    if($this->form_validation->run()===FALSE) echo json_encode(array("status" => FALSE,"message" => validation_errors()));	
		else{
			$this->approval->update(array('id_status'=>3,'user_approve'=>$this->session->userdata('id')),array('id_video'=>$this->input->post('id')));
            echo json_encode(array("status" => true));
	    }
	}

	public function ajax_reject(){
    	$this->form_validation->set_rules('id','ID','trim|required|is_natural_no_zero');
	    if($this->form_validation->run()===FALSE) echo json_encode(array("status" => FALSE,"message" => validation_errors()));	
		else{
			$this->approval->update(array('id_status'=>4,'user_approve'=>$this->session->userdata('id')),array('id_video'=>$this->input->post('id')));
            echo json_encode(array("status" => true));
	    }
	}
}