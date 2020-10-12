<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('upload_model', 'upload_video');
    }

	public function index(){
        // $lists = $this->upload_video->get_list_video_category();
        // $opt = array(0 => 'Select Category');
        // foreach ($lists as $key => $value) $opt[$key] = $value;
        $this->load->view('part/default/wrapper',array('content'=>'dashboard/dashboard','content_js'=>'dashboard/dashboard_js','menu'=>$this->getAllUserMenu()));
	}

}