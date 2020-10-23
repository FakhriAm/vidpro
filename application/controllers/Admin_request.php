<?php defined('BASEPATH') or exit('No direct script access allowed');
class Admin_request extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_request_model', 'myrequest');
		$this->load->model('video_model', 'vid');
	}

	public function index()
	{
		$lists = $this->myrequest->get_list_company();
		$opt = array(0 => 'Select Company');
		foreach ($lists as $key => $value) $opt[$key] = $value;
		$this->load->view(
			'part/default/wrapper',
			array(
				'content' => 'Admin_request/Admin_request_view',
				'content_js' => 'Admin_request/Admin_request_js',
				'video_source' => $this->loadVideoSource(),
				'menu' => $this->getAllUserMenu(),
				'filter_company' => form_dropdown('', $opt, '', 'name="send_to" id="send_to" class="form-control"')
			)
		);
	}


	public function ajax_list()
	{
		$list = $this->myrequest->get_datatables_myrequest();
		$data = array();
		$crs = "";
		$no = $_POST['start'];
		foreach ($list as $key) {
			$a = $key->link;
			$b = $key->status;

			//link button
			if ($a != null && $b == 'Completed') {
				$a = '<a href="' . base_url('video/downloadVideo?link=http://10.11.5.71/video/' . $key->link) . '">
                <button class="btn btn-block btn-outline-primary">
                  <span class="icon text-white">
                  
                  </span>
                  <span class="text">
                    Download
                  </span>
                </button>
              </a>';
			} else if ($a == 'Video Not Available') {
				$a = '<button type="button" class="btn btn-block btn-outline-danger" disabled>Link Not Available</button>';
			} else {
				$a = '<button type="button" class="btn btn-block btn-outline-success" disabled>Link Requested</button>';
			}

			// status button
			if ($b == 'Waiting') {
				$b = '<button class="btn btn-block btn-warning" href="#" ><span class="text" style="color:white;">' . $key->status . '</span></button>';
			} else if ($b == 'Video Not Available') {
				$b = '<button class="btn btn-block btn-danger" href="#" ><span class="text" style="color:white;">' . $key->status . '</span></button>';
			} else {
				$b = '<button class="btn btn-block btn-success" href="#" ><span class="text" style="color:white;">' . $key->status . '</span></button>';
			}

			$data[] =
				array(
					++$no,
					$key->request_date,
					$key->source,
					$key->from,
					$key->desc_uid_requester,
					$key->request_program,
					$key->notes,
					//'<span class="label label-success">Warning Label</span>',
					$b,
					// '<button class="btn btn-info btn-icon-split btn-sm" href="#" ><span class="text" style="color:white;">' . $key->status . '</span></button>',
					// $key->status,
					$key->receive_date,
					$a
					//'<button class="btn btn-warning btn-icon-split" href="' . base_url('incoming_request/downloadVideo?link=' . $key->link) . '"><span class="text" style="color:white;">Download Here</span></button>'
					// '<button class="btn btn-warning btn-icon-split btn-sm" href="#"><span class="text">"'. $key->status.'"</span></button>', 
					// '<button class="btn btn-warning btn-icon-split btn-sm" href="#" onclick="showModal(' . "'" . $key->id . "'" . ')"data-toggle="modal" data-target="#editModal"><span class="icon text-white"><i class="fas fa-edit"></i></span><span class="text"> Edit</span></button><button class="btn btn-danger btn-icon-split btn-sm" onclick="deleteData(' . "'" . $key->id . "'" . ')"><span class="icon text-white"><i class="fas fa-trash"></i></span><span class="text">Delete</span></button>'
				);
		}
		echo json_encode(array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->myrequest->count_filtered(),
			"recordsFiltered" => $this->myrequest->count_filtered(),
			"data" => $data
		));
	}

	public function ajax_add()
	{
		$n = $this->session->userdata('nik');
		date_default_timezone_set('Asia/Bangkok');
		// $this->form_validation->set_rules('request_date','Type','trim|required');
		$this->form_validation->set_rules('send_to', 'Date', 'trim|required');
		$this->form_validation->set_rules('program_name', 'Department', 'trim|required');
		if ($this->form_validation->run() === FALSE) echo json_encode(array("status" => FALSE, "message" => 'You are data is not valid!'));
		else {
			$this->myrequest->save(
				array(
					'request_date' => date("Y-m-d H:i:s"),
					'send_to' => $this->input->post('send_to'),
					'from' => $this->session->userdata('company'),
					'request_program' => $this->input->post('program_name'),
					'notes' => $this->input->post('notes'),
					'uid_requester' => $this->session->userdata('id')
				)
			);
			echo json_encode(array("status" => TRUE));
		}
	}
	public function loadVideoSource()
	{
		return $this->vid->get_video_source();
	}
}
