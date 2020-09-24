<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Log_download extends MY_Controller {

	public function index(){
		$this->load->view('part/default/wrapper',array('content'=>'log_download/log_download_view','menu'=>$this->getAllUserMenu()));
	}
}