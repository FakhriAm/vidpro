<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {

	function __construct(){
        parent::__construct();
       $this->load->model('video_model','vid');
    }

	public function index(){
        //$lists = $this->upload_video->get_video_source();
        //$opt = array(0 => 'Select Category');
        //foreach ($lists as $key => $value) $opt[$key] = $value;
		//var_dump($this->vid->get_latest_video());
		//exit;
        $this->load->view('part/default/wrapper',array('content'=>'dashboard/dashboard','video_source'=> $this->loadVideoSource(),'content_js'=>'dashboard/dashboard_js','menu'=>$this->getAllUserMenu(),'data'=>$this->vid->get_latest_video()));
	}
	
	public function source($q){
		$row = $this->vid->check_video_source(strip_tags($q));
		if(!$row) redirect('au');
		else $this->load->view('part/default/wrapper',array('title'=>ucfirst(strtolower($row->content)),'content'=>'dashboard/dashboard','video_source'=> $this->loadVideoSource(),'content_js'=>'dashboard/dashboard_js','menu'=>$this->getAllUserMenu(),'data'=>$this->vid->get_video_by_source_id($row->id),'sumber'=>$row->content));
		//else $this->load->view('parts/wrapper',array('content'=>'main/video_content','title'=>ucfirst(strtolower($row->content)),'video_category'=> $this->loadVideoCategory(),'video_type'=>$this->loadVideoType(),'data'=>$this->vid->get_video_by_category_id($row->id)));
	}

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
            $this->load->view('part/default/wrapper',array('content'=>'video_detail/video_detail_view','video_source'=> $this->loadVideoSource(),'menu'=>$this->getAllUserMenu(),'hls'=>$hls,'link'=>$link,'thumbnail'=>$thumbnail,'data'=>$row,'badge'=>$badge));
		} 
	}
	
	public function loadVideoSource(){
		return $this->vid->get_video_source();
	}

	public function profile(){
        $this->load->view('part/default/wrapper', array('content' => 'user/profile', 'menu' => $this->getAllUserMenu()));
    }
}