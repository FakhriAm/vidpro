<?php defined('BASEPATH') OR exit('No direct script access allowed');
class My_request extends MY_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('my_request_model','myrequest');
    }

	public function index(){
		$lists = $this->myrequest->get_list_company();
		$opt = array(0 => 'Select Company');
        foreach ($lists as $key => $value) $opt[$key] = $value;
		$this->load->view('part/default/wrapper',array('content'=>'my_request/my_request_view','menu'=>$this->getAllUserMenu(),'filter_company'=>form_dropdown('',$opt,'','name="video_source" class="form-control"')));
	}

	
	public function ajax_list(){
        $list = $this->external->get_datatables_myrequest();
        $data = array();
		$crs = "";
        $no = "0";
        foreach ($list as $key) $data[] = array(++$no,$key->request_date,$key->send_to,$key->request_program,$key->notes,$key->status,$key->counter); 
        echo json_encode(array("draw" => $_POST['draw'],"data" => $data));
	}
	
	

}