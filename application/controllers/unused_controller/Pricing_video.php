<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pricing_video extends MY_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('pricing_video_model', 'pricing');
    }

	public function index(){
		$this->load->view('part/default/wrapper',array('content'=>'pricing_video/pricing_video_view','content_js'=>'pricing_video/pricing_video_js','menu'=>$this->getAllUserMenu()));
	}

	public function get_video_type($index){
		$lists = $this->pricing->get_list_video_type();
        $opt = array(0 => 'Select video type');
		foreach ($lists as $key => $value) $opt[$key] = $value;
		return form_dropdown('',$opt,'','id="id_video_type_'.$index.'" name="id_video_type" class="custom-select form-control form-control-sm mb-2"');
	}

	public function get_video_price($index){
		$lists = $this->pricing->get_list_video_price();
        $opt = array(0 => 'Select video price');
		foreach ($lists as $key => $value) $opt[$key] = $value;
		return form_dropdown('',$opt,'','id="id_video_price_'.$index.'" name="id_video_price" class="custom-select form-control form-control-sm mb-2"');
	}

	public function ajax_list(){
        $list = $this->pricing->get_datatables();
        $data = array();
		$crs = "";
        $no = $_POST['start'];
        foreach ($list as $key){
        	$badge = '';
        	$arr_badge = explode(",", $key->tag);
        	if(sizeof($arr_badge) > 0) for ($i=0; $i < sizeof($arr_badge) ; $i++) $badge.='<span class="badge badge-info">'.$arr_badge[$i].'</span> ';
        	else $badge = '-';
            $data[] = array(++$no,'<img class="test" width="110" height="60" src="http://10.11.5.71/thumbnail/'.$key->id_thumbnail.'">',$key->video_title,$key->description,'04:30',$key->uploader,$this->get_video_type($no),$this->get_video_price($no),'<button class="btn btn-info btn-icon-split btn-sm" onclick="editData('.$key->id_video.','.$no.')"><span class="icon text-white"><i class="fas fa-check"></i></span><span class="text">Submit</span></button>');  
        } 
        echo json_encode(array("draw" => $_POST['draw'],"recordsTotal" => $this->pricing->count_all(),"recordsFiltered" => $this->pricing->count_filtered(),"data" => $data));
    }

    public function ajax_edit(){
    	$this->form_validation->set_rules('id','ID','trim|required|is_natural_no_zero');
	    $this->form_validation->set_rules('id_video_type','video type','trim|required|is_natural_no_zero');
	    $this->form_validation->set_rules('id_video_price','video price','trim|required|is_natural_no_zero');
	    if($this->form_validation->run()===FALSE) echo json_encode(array("status" => FALSE,"message" => validation_errors()));	
		else{
            $this->pricing->update(array('id_video_type'=>$this->input->post('id_video_type'),'id_video_price'=>$this->input->post('id_video_price'),'id_status'=>2,'user_do_pricing'=>$this->session->userdata('id')),array('id_video'=>$this->input->post('id')));
            echo json_encode(array("status" => true));
	    }
	}
}