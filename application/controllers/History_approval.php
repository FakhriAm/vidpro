<?php defined('BASEPATH') OR exit('No direct script access allowed');
class History_approval extends MY_Controller {

	public function index(){
		$this->load->view('part/default/wrapper',array('content'=>'approval_video_history/approval_video_history_view','menu'=>$this->getAllUserMenu()));
	}
}