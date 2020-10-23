<?php defined('BASEPATH') or exit('No direct script access allowed');
class User_request extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_request_model', 'request');
		$this->load->model('video_model', 'vid');
		$this->load->model('Admin_request_model', 'Admin_request');
	}

	public function index()
	{
		$lists = $this->request->get_list_company();
		$opt = array(0 => 'Select Company');
		foreach ($lists as $key => $value) $opt[$key] = $value;
		$this->load->view('part/default/wrapper', array('content' => 'user_request/user_request_view', 'content_js' => 'user_request/user_request_js', 'video_source' => $this->loadVideoSource(), 'menu' => $this->getAllUserMenu(), 'filter_company' => form_dropdown('', $opt, '', 'name="send_to" id="send_to" class="form-control"')));
	}


	public function ajax_list()
	{
		$list = $this->request->get_datatables_userrequest();
		$data = array();
		$crs = "";
		$no = $_POST['start'];
		foreach ($list as $key) {
			
			$data[] =
				array(
					++$no,
					$key->tgl_request,
					$key->to_company,
					$key->username,
					$key->request_program,
					$key->notes,
					'<button class="btn btn-success" onclick="approveRequest(' . "'" . $key->id . "'" . ')" ><span class="icon text-white"><i class="fas fa-edit"></i></span><span class="text"> APPROVE </span></button>
				<button type="button" class="btn btn-danger" onclick="showModalReject(' . "'" . $key->id . "'" . ')"> <span class="icon text-white"><i class="fas fa-exclamation-triangle"></i></span><span class="text"> REJECT </span>'
				);
		}
		echo json_encode(array("draw" => $_POST['draw'], 
		"recordsTotal" => $this->request->count_filtered(),
		"recordsFiltered" => $this->request->count_filtered(),
		"data" => $data));
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
			$this->Admin_request->save(
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
	
	public function ajax_approve(){
		date_default_timezone_set('Asia/Bangkok');
    	$this->form_validation->set_rules('id','ID','trim|required|is_natural_no_zero');
    	if($this->form_validation->run()===FALSE) echo json_encode(array("status" => FALSE,"message" => validation_errors()));
		else{
			/* UPDATE TBLREQUEST_USER */
            $this->request->update(array('id_userapproval'=>$this->session->userdata('id'),'status'=>"Y",'tgl_approved'=>date("Y-m-d H:i:s")),array('id'=>$this->input->post('id')));
            
			
			
			/* UPDATE REQUEST_TRANSACTION */
			$user_request_data = $this->request->get_by_id($this->input->post('id'));
			
			$this->Admin_request->save(
				array(
					'request_date' => date("Y-m-d H:i:s"),
					'send_to' => $user_request_data->id_to_company,
					'from' => $this->session->userdata('company'),
					'request_program' => $user_request_data->request_program,
					'notes' => $user_request_data->notes,
					'uid_requester' => $this->session->userdata('id')
				)
			);
			//$this->Admin_request->save(array(),array());
			echo json_encode(array("status" => true));
	    }
	}
	
	public function ajax_reject_request(){
		date_default_timezone_set('Asia/Bangkok');
    	$this->form_validation->set_rules('id','ID','trim|required|is_natural_no_zero');
		$this->form_validation->set_rules('reasonreject', 'Reason of Rejection', 'trim|required|min_length[15]');
    	if($this->form_validation->run()===FALSE) echo json_encode(array("status" => FALSE,"message" => validation_errors()));
		else{
			/* UPDATE TBLREQUEST_USER */
            $this->request->update(array('id_userapproval'=>$this->session->userdata('id'),'status'=>"R",'reason_reject'=>$this->input->post('reasonreject'),'tgl_approved'=>date("Y-m-d H:i:s")),array('id'=>$this->input->post('id')));
			//$this->Admin_request->save(array(),array());
			echo json_encode(array("status" => true));
	    }
	}
	
	public function ajax_get_request(){
    	$this->form_validation->set_rules('id','ID','trim|required|is_natural_no_zero');
    	if($this->form_validation->run()===FALSE) echo json_encode(array("status" => FALSE,"message" => validation_errors()));
		else echo json_encode(array("status" => true, 'row'=>$this->request->get_by_id($this->input->post('id'))));
    }
	public function loadVideoSource()
	{
		return $this->vid->get_video_source();
	}
}
