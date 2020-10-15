<?php defined('BASEPATH') or exit('No direct script access allowed');
class My_request extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('my_request_model', 'myrequest');
		$this->load->model('video_model','vid');
	}

	public function index()
	{
		$lists = $this->myrequest->get_list_company();
		$opt = array(0 => 'Select Company');
		foreach ($lists as $key => $value) $opt[$key] = $value;
		$this->load->view('part/default/wrapper', array('content' => 'my_request/my_request_view', 'content_js' => 'my_request/my_request_js','video_source'=> $this->loadVideoSource(), 'menu' => $this->getAllUserMenu(), 'filter_company' => form_dropdown('', $opt, '', 'name="send_to" id="send_to" class="form-control"')));
	}


	public function ajax_list()
	{
		$list = $this->myrequest->get_datatables_myrequest();
		$data = array();
		$crs = "";
		$no = $_POST['start'];
		foreach ($list as $key) {
			$data[] = 
			array(
				++$no,
				$key->request_date, 
				$key->source,
				$key->from,  
				$key->request_program, 
				$key->notes, 
				'<button class="btn btn-warning btn-icon-split btn-sm" href="#"><span class="text" style="color:white;">'. $key->status.'</span></button>', 
				// $key->status,
				$key->receive_date,
				'<button class="btn btn-warning btn-icon-split btn-sm" href="#"><span class="text" style="color:white;">Download</span></button>'
				// '<button class="btn btn-warning btn-icon-split btn-sm" href="#"><span class="text">"'. $key->status.'"</span></button>', 
				// '<button class="btn btn-warning btn-icon-split btn-sm" href="#" onclick="showModal(' . "'" . $key->id . "'" . ')"data-toggle="modal" data-target="#editModal"><span class="icon text-white"><i class="fas fa-edit"></i></span><span class="text"> Edit</span></button><button class="btn btn-danger btn-icon-split btn-sm" onclick="deleteData(' . "'" . $key->id . "'" . ')"><span class="icon text-white"><i class="fas fa-trash"></i></span><span class="text">Delete</span></button>'
			);
		}
		echo json_encode(array("draw" => $_POST['draw'], "recordsTotal" => $this->myrequest->count_all(), "data" => $data));
	}

	public function ajax_add(){
		$n = $this->session->userdata('company');
		date_default_timezone_set('Asia/Bangkok');
		// $this->form_validation->set_rules('request_date','Type','trim|required');
		$this->form_validation->set_rules('send_to','Date','trim|required');
		$this->form_validation->set_rules('program_name','Department','trim|required');
		if($this->form_validation->run()===FALSE) echo json_encode(array("status" => FALSE,"message" => 'You are data is not valid!'));
		else { 
			$this->myrequest->save(
				array(
					'request_date' => date("Y-m-d h:i:s"),
					'send_to' => $this->input->post('send_to'),
					'from' => $this->session->userdata('company'),
					'request_program' => $this->input->post('program_name'),
					'notes' => $this->input->post('notes')
				)
			);
			echo json_encode(array("status" => TRUE));
		}	
	}
	public function loadVideoSource(){
		return $this->vid->get_video_source();
	}
}
