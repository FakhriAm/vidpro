<?php defined('BASEPATH') or exit('No direct script access allowed');
class My_request extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('my_request_model', 'myrequest');
	}

	public function index()
	{
		$lists = $this->myrequest->get_list_company();
		$opt = array(0 => 'Select Company');
		foreach ($lists as $key => $value) $opt[$key] = $value;
		$this->load->view('part/default/wrapper', array('content' => 'my_request/my_request_view', 'content_js' => 'my_request/my_request_js', 'menu' => $this->getAllUserMenu(), 'filter_company' => form_dropdown('', $opt, '', 'name="video_source" class="form-control"')));
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
				$key->send_to,
				$key->from,  
				$key->request_program, 
				$key->notes, 
				'<button class="btn btn-warning btn-icon-split btn-sm" href="#"><span></span><span class="text">'. $key->status.'</span></button>', 
				$key->receive_date, 
				
				// '<button class="btn btn-warning btn-icon-split btn-sm" href="#" onclick="showModal(' . "'" . $key->id . "'" . ')"data-toggle="modal" data-target="#editModal"><span class="icon text-white"><i class="fas fa-edit"></i></span><span class="text"> Edit</span></button><button class="btn btn-danger btn-icon-split btn-sm" onclick="deleteData(' . "'" . $key->id . "'" . ')"><span class="icon text-white"><i class="fas fa-trash"></i></span><span class="text">Delete</span></button>'
			);
		}
		echo json_encode(array("draw" => $_POST['draw'], "recordsTotal" => $this->myrequest->count_all(), "data" => $data));
	}

	public function ajax_add(){
		$this->form_validation->set_rules('request_date','Type','trim|required');
		$this->form_validation->set_rules('video_source','Date','trim|required');
		$this->form_validation->set_rules('program_name','Department','trim|required');
		if($this->form_validation->run()===FALSE) echo json_encode(array("status" => FALSE,"message" => 'You are data is not valid!'));
		else { 
			$this->myrequest->save(
				array(
					'request_date' => $this->input->post('request_date'),
					'request_date' => $this->input->post('video_source'),
					'send_to' => $this->input->post('send_to'),
					'notes' => $this->input->post('notes'),
					// 'status' => $this->input->post('status'),
					// 'user' => $this->input->post('user'),
					// 'pic' => $this->input->post('pic'),
					// 'id_administration_type' => $this->input->post('id_administration_type')
				)
			);
			echo json_encode(array("status" => TRUE));
		}	
	}
}
