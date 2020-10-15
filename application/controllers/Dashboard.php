<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {

	function __construct(){
        parent::__construct();
       $this->load->model('video_model','vid');
    }

	public function index(){
        //$lists = $this->upload_video->get_video_source();
        //$opt = array(0 => 'Select Category');
        //foreach ($lists as $key => $value) $opt[$key] = $value;
		//var_dump($this->vid->get_latest_video());
		//exit;
        $this->load->view('part/default/wrapper',array('content'=>'dashboard/dashboard','video_source'=> $this->loadVideoSource(),'content_js'=>'dashboard/dashboard_js','menu'=>$this->getAllUserMenu(),'data'=>$this->vid->get_latest_video()));
	}
	
	public function loadVideoSource(){
		return $this->vid->get_video_source();
	}
}