<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('upload_model', 'upload_video');
    }

	public function index(){
        $lists = $this->upload_video->get_list_video_category();
        $opt = array(0 => 'Select Category');
        foreach ($lists as $key => $value) $opt[$key] = $value;
        $this->load->view('part/default/wrapper',array('content'=>'add_user/add_user_view','content_js'=>'add_user/add_user_js','menu'=>$this->getAllUserMenu(),'filter_category'=>form_dropdown('',$opt,'','name="id_video_category" class="form-control"')));
	}

    public function profile(){
        $this->load->view('part/default/wrapper',array('content'=>'user/profile','menu'=>$this->getAllUserMenu()));    
    }
}