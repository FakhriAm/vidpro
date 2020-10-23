<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Video extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('video_model','vid');
	}

	public function index(){
<<<<<<< HEAD
		$this->load->view('parts/wrapper',array('content'=>'main/dashboard','video_category'=> $this->loadVideoCategory(),'video_type'=>$this->loadVideoType()));
	}

=======
		$this->load->view('parts/wrapper',array('content'=>'main/dashboard','video_category'=> $this->loadVideoCategory(),'video_source'=> $this->loadVideoSource(),'video_type'=>$this->loadVideoType()));
	}
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
// check the load
	public function detail(){
		$row = $this->vid->get_video_by_id(intval(strip_tags($this->input->get('q'))));
		if(!$row) redirect('au');
		else{
			$badge = '';
            $arr_badge = explode(",", $row->tag);
            if(sizeof($arr_badge) > 0) for ($i=0; $i < sizeof($arr_badge) ; $i++) $badge.='<span class="badge badge-info">'.$arr_badge[$i].'</span> ';
            else $badge = '-';
            $link = 'http://10.11.5.71/video/'.$row->video_id;
            $thumbnail = 'http://10.11.5.71/thumbnail/'.$row->id_thumbnail;
			$hls = 'http://10.11.5.71/hls/'.$row->video_low;
            $this->load->view('part/default/wrapper',array('content'=>'video_detail/video_detail_view','video_category'=> $this->loadVideoCategory(),'video_source'=> $this->loadVideoSource(),'video_type'=>$this->loadVideoType(),'hls'=>$hls,'link'=>$link,'thumbnail'=>$thumbnail,'data'=>$row,'badge'=>$badge));
		} 
<<<<<<< HEAD
		// 'menu' => $this->getAllUserMenu() ini belum dipanggil
	}
	
	public function loadVideoSource(){
		return $this->vid->get_video_source();
=======
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
	}

	public function search(){
		$q = strtolower(strip_tags($this->input->get('q')));
<<<<<<< HEAD
		$this->load->view('parts/wrapper',array('content'=>'main/video_content','title'=>'Search Result for "'.$q.'"','video_category'=> $this->loadVideoCategory(),'video_type'=>$this->loadVideoType(),'data'=>$this->vid->search_video(strip_tags($q))));
=======
		$this->load->view('parts/wrapper',array('content'=>'main/video_content','title'=>'Search Result for "'.$q.'"','video_category'=> $this->loadVideoCategory(),'video_source'=> $this->loadVideoSource(),'video_type'=>$this->loadVideoType(),'data'=>$this->vid->search_video(strip_tags($q))));
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
	}

	public function category($q){
		$row = $this->vid->check_video_category(strip_tags($q));
<<<<<<< HEAD
		var_dump($row);
		exit;
		if(!$row) redirect('au');
		else $this->load->view('parts/wrapper',array('content'=>'main/video_content','title'=>ucfirst(strtolower($row->content)),'video_category'=> $this->loadVideoCategory(),'video_type'=>$this->loadVideoType(),'data'=>$this->vid->get_video_by_category_id($row->id)));
=======
		if(!$row) redirect('au');
		else $this->load->view('parts/wrapper',array('content'=>'main/video_content','title'=>ucfirst(strtolower($row->content)),'video_category'=> $this->loadVideoCategory(),'video_source'=> $this->loadVideoSource(),'video_type'=>$this->loadVideoType(),'data'=>$this->vid->get_video_by_category_id($row->id)));
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
	}

	public function type($q){
		$row = $this->vid->check_video_type(strip_tags($q));
		if(!$row) redirect('au');
<<<<<<< HEAD
		else $this->load->view('parts/wrapper',array('content'=>'main/video_content','title'=>ucfirst(strtolower($row->content)),'video_category'=> $this->loadVideoCategory(),'video_type'=>$this->loadVideoType(),'data'=>$this->vid->get_video_by_type_id($row->id)));
=======
		else $this->load->view('parts/wrapper',array('content'=>'main/video_content','title'=>ucfirst(strtolower($row->content)),'video_category'=> $this->loadVideoCategory(),'video_source'=> $this->loadVideoSource(),'video_type'=>$this->loadVideoType(),'data'=>$this->vid->get_video_by_type_id($row->id)));
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
	}

	public function loadVideoCategory(){
		return $this->vid->get_video_category();
	}

<<<<<<< HEAD
=======
	public function loadVideoSource(){
		return $this->vid->get_video_source();
	}


>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
	public function loadVideoType(){
		return $this->vid->get_video_type();
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
<<<<<<< HEAD
	
	
	public function log_video_download(){
		//return $this->vid->get_video_category();
=======
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
	}

	public function user_profile(){
		// $this->load->view('user/profile');
<<<<<<< HEAD
		$this->load->view('parts/wrapper',array('content'=>'user/profile','video_category'=> $this->loadVideoCategory(),'video_type'=>$this->loadVideoType()));
=======
		$this->load->view('parts/wrapper',array('content'=>'user/profile','video_source'=> $this->loadVideoSource(),'video_category'=> $this->loadVideoCategory(),'video_type'=>$this->loadVideoType()));
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
	}
}
