<?php defined('BASEPATH') or exit('No direct script access allowed');
class Incoming_request extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Incoming_request_model', 'incoming');
		$this->load->model('video_model', 'vid');
	}

	public function index()
	{
		// $lists = $this->incoming->get_list_video_category();
		// $opt = array(0 => 'Select Category');
		// foreach ($lists as $key => $value) $opt[$key] = $value;
		date_default_timezone_set('Asia/Bangkok');
		$this->load->view('part/default/wrapper', array('content' => 'incoming_request/incoming_request_view', 'content_js' => 'incoming_request/incoming_request_js', 'menu' => $this->getAllUserMenu(), 'video_source' => $this->loadVideoSource()));
	}

	public function ajax_list()
	{
		$list = $this->incoming->get_datatables_inrequest();
		$data = array();
		$crs = "";
		$no = $_POST['start'];
		foreach ($list as $key) {
			$data[] =
				array(
					++$no,
					$key->request_date,
					// $key->send_to,
					$key->source,
					$key->request_program,
					$key->notes,
					'<button class="btn btn-success btn-icon-split" href="#" onclick="showModal(' . "'" . $key->request_id . "'" . ')"data-toggle="modal" data-target="#uploadModal"><span class="icon text-white"><i class="fas fa-edit"></i></span><span class="text"> Upload</span></button>
                	<button type="button" class="btn btn-danger" onclick="showModalnotfound(' . "'" . $key->request_id . "'" . ')" data-toggle="modal" data-target="#myModal"> <span class="icon text-white"><i class="fas fa-exclamation-triangle"></i></span><span class="text"> Not Available</span>',
					$key->receive_date
				);
		}
		echo json_encode(array("draw" => $_POST['draw'], "recordsTotal" => $this->incoming->count_all(), "data" => $data));
	}

	public function loadVideoSource()
	{
		return $this->vid->get_video_source();
	}

	public function finished_uploadtry()
	{
		$this->incoming->update(array('status' => '<a href="">Download</a>'), array('request_id' => $this->input->post('id')));
	}

	public function finished_upload()
	{
		$this->incoming->update(array('status' => 'Completed', 'receive_date' => date("Y-m-d h:i:s")), array('request_id' => $this->input->post('id')));
	}

	public function video_not_found()
	{
		$this->incoming->update(array('link' => 'not_found', 'receive_date' => date("Y-m-d h:i:s")), array('request_id' => $this->input->post('id')));
	}
}
