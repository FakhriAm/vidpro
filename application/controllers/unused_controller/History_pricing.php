<?php defined('BASEPATH') OR exit('No direct script access allowed');
class History_pricing extends MY_Controller {

	public function index(){
		$this->load->view('part/default/wrapper',array('content'=>'pricing_video_history/pricing_video_history_view','menu'=>$this->getAllUserMenu()));
	}
}