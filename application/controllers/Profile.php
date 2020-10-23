<?php defined('BASEPATH') or exit('No direct script access allowed');
class Profile extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('video_model', 'vid');
    }

    public function index()
    {
        // $lists = $this->vid->get_list_video_category();
        // $opt = array(0 => 'Select Category');
        // foreach ($lists as $key => $value) $opt[$key] = $value;
        $this->load->view('part/default/wrapper', array('content' => 'user/profile', 'menu' => $this->getAllUserMenu(), 'filter_company' => form_dropdown('', $opt, '', 'name="send_to" id="send_to" class="form-control"')));
    }

    // public function profile(){
    //     $this->load->view('part/default/wrapper', array('content' => 'user/profile', 'menu' => $this->getAllUserMenu(), 'filter_company' => form_dropdown('', $opt, '', 'name="send_to" id="send_to" class="form-control"')));
    // }

    // public function loadVideoSource()
    // {
    //     return $this->vid->get_video_source();
    // }
}
