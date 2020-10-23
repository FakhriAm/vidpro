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
<<<<<<< HEAD
			$a = $key->link;
			$b = $key->status;
			if($a != null ){
				$a = '<button type="button" class="btn btn-outline-success" disabled>Request Uploaded</button>';
			}else{
				if($b == 'Video Not Available'){
					$a = '<button type="button" class="btn btn-outline-danger" disabled>Video Not Available</button>';
				}else{
				$a = '<button class="btn btn-success" href="#" onclick="showModal(' . "'" . $key->request_id . "'" . ')"data-toggle="modal" data-target="#uploadModal"><span class="icon text-white"><i class="fas fa-edit"></i></span><span class="text"> Upload</span></button>
				<button type="button" class="btn btn-danger" onclick="setVideoNotAvailable(' . "'" . $key->request_id . "'" . ')" data-toggle="modal" data-target="#myModal"> <span class="icon text-white"><i class="fas fa-exclamation-triangle"></i></span><span class="text"> Not Available</span>';
			}}
=======
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
			$data[] =
				array(
					++$no,
					$key->request_date,
					// $key->send_to,
					$key->source,
					$key->request_program,
					$key->notes,
<<<<<<< HEAD
					$a,
					$key->uploaded_date
				);
		}
		echo json_encode(array("draw" => $_POST['draw'], 
		"recordsTotal" => $this->incoming->count_filtered(),
		"recordsFiltered" => $this->incoming->count_filtered(),
		"data" => $data));
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
		$this->incoming->update(array('status' => 'Completeds', 'uploaded_date' => date('Y-m-d H:i:s')), array('request_id' => $this->input->post('id')));
	}

	public function video_not_found()
	{
		$this->incoming->update(array('link' => 'not_found', 'receive_date' => date("Y-m-d H:i:s")), array('request_id' => $this->input->post('id')));
	}
	
	public function ajax_delete(){
		date_default_timezone_set('Asia/Bangkok');
    	$this->form_validation->set_rules('id','ID','trim|required|is_natural_no_zero');
    	if($this->form_validation->run()===FALSE) echo json_encode(array("status" => FALSE,"message" => validation_errors()));
		else{
            $this->incoming->update(array('status'=>"Video Not Available",'link'=>"Video Not Available",'receive_date'=>date("Y-m-d H:i:s")),array('request_id'=>$this->input->post('id')));
            echo json_encode(array("status" => true));
	    }
	}
	public function downloadVideo(){
		$filename = basename($this->input->get('link'));
		$local_file = 'sample-'.md5((round(microtime(true) * 1000))).'.mp4';
		header("Cache-Control:public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: video/mp4");
        header("Content-Transfer-Encoding: binary");
        readfile($this->input->get('link'));
        exit();
=======
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
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
	}
}
