<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('upload_model', 'upload_video');
    }

	public function index(){
        $lists = $this->upload_video->get_list_video_category();
        $opt = array(0 => 'Select Category');
        foreach ($lists as $key => $value) $opt[$key] = $value;
        $this->load->view('part/default/wrapper',array('content'=>'dashboard/dashboard','content_js'=>'dashboard/dashboard_js','menu'=>$this->getAllUserMenu(),'filter_category'=>form_dropdown('',$opt,'','name="id_video_category" class="form-control"')));
	}

//     public function ajax_savevideo(){
// 	   $this->form_validation->set_rules('videotitle','video title','trim|required|max_length[50]');
// 	    $this->form_validation->set_rules('journo','journalist','trim|required|max_length[50]');
// 	    $this->form_validation->set_rules('desc','description','trim|required|max_length[160]');
//         $this->form_validation->set_rules('tag','tag','trim|required');
//         $this->form_validation->set_rules('id_video_category','video category','trim|required|is_natural_no_zero');
//         $this->form_validation->set_rules('hour','duration hour','trim|required|is_natural|less_than[100]');
//         $this->form_validation->set_rules('minute','duration minute','trim|required|is_natural|less_than[60]');
//         $this->form_validation->set_rules('second','duration second','trim|required|is_natural|less_than[60]');
// 	    if($this->form_validation->run()===FALSE) echo json_encode(array("status" => FALSE,"message" => validation_errors()));	
// 		else{ 
//           $video = $_FILES['videofile'];
//             $thumbnail = $_FILES['thumbfile'];
// /* 			var_dump($video);
// 			var_dump($thumbnail);
// 			exit(); */
// 	        if(!empty($video['name']) && !empty($thumbnail['name'])){
//                 //check format
//                 if($this->validate_video_format($video['type'])){
//                     if($this->validate_thumbnail_format($thumbnail['type'])){
//                         $ftp_server = "10.11.5.71";  //address of ftp server.
//                         $ftp_user_name = "cnnftpvcp"; // Username
//                         $ftp_user_pass = "4dm1nCNN1nd";   // Password
//                         $conn_id = ftp_connect($ftp_server); // set up basic connection
//                         $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
//                         if((!$conn_id) || (!$login_result)){  
//                             // check connection
//                             ftp_close($conn_id);
//                             echo json_encode(array("status" => false,'message'=>'FTP connection has failed!'));
//                         } else {
//                             $timestamp = md5((round(microtime(true) * 1000)));
//                             // upload the file
//                             $video_name = $timestamp."_".$video['name'];
//                             if (!ftp_put($conn_id, '/home/cnnftpvcp/video/'.$video_name, $video['tmp_name'], FTP_BINARY)) {
//                                 echo json_encode(array("status" => false,'message'=>'Failed to upload file!'));
//                             } else {
//                                 //change mod 644 to video
//                                 ftp_chmod($conn_id, 0644, '/home/cnnftpvcp/video/'.$video_name);
//                                 //generate hls;
//                                 if(!$this->generatehls($conn_id,$video,$video_name)) echo json_encode(array("status" => false,'message'=>'Failed to generate low quality video!'));
//                                 else{
//                                     $thumbnail_name = $timestamp."_".$thumbnail['name'];
                                    
// 									if(!ftp_put($conn_id, '/home/cnnftpvcp/thumbnail/'.$thumbnail_name, $thumbnail['tmp_name'], FTP_BINARY)) $thumbnail_name = '/home/cnnftpvcp/thumbnail/ex_thumbnail.jpg';
//                                     else {
// 										ftp_chmod($conn_id, 0644, '/home/cnnftpvcp/thumbnail/'.$thumbnail_name);
//                                         $file = explode(".", $video_name);
//                                         $insert = $this->upload_video->save(array('video_title'=>strip_tags($this->input->post('videotitle')),'journalist'=>strip_tags($this->input->post('journo')),'description'=>strip_tags($this->input->post('desc')),'uploaded_date'=>date('Y:m:d H:i:s'),'uploader'=>$this->session->userdata('id'),'id_thumbnail'=>$thumbnail_name,'video_id'=>$video_name,'video_low'=>$file[0].".m3u8",'tag'=>strip_tags($this->input->post('tag')),'id_video_category'=>$this->input->post('id_video_category'),'duration'=>$this->generateDuration($this->input->post('hour'),$this->input->post('minute'),$this->input->post('second'))));
//                                         echo json_encode(array("status" => true,"message"=>"Video & thumbnail uploaded sucessfully"));
//                                     }  
//                                 }
//                             }
//                             ftp_close($conn_id);
//                         }
//                     } else echo json_encode(array("status" => false,'message'=>'Thumbnail format is not permitted'));
//                 } else echo json_encode(array("status" => false,'message'=>'Video format is not permitted'));
// 	        } else echo json_encode(array("status" => false,'message'=>'video and thumbnail cannot be null'));
// 		}
		 
// 	}

    // public function validate_video_format($video){
    //     $allowed_ext = array('mp4','x-flv');
    //     $ext = explode('/',$video);
    //     foreach ($allowed_ext as $key) {
    //         if($ext[1] == $key) return true;
    //     }
    //     return false;        
    // }

    // public function validate_thumbnail_format($thumbnail){
    //     $allowed_ext = array('jpg','jpeg','png');
    //     $ext = explode('/',$thumbnail);
    //     foreach ($allowed_ext as $key) {
    //         if($ext[1] == $key) return true;
    //     }
    //     return false;        
    // }

    // public function generateDuration($hour,$minute,$second){
    //     if($second < 10) $second = "0".$second;
    //     if($minute < 10) $minute = "0".$minute;
    //     if($hour < 10) $hour = "0".$hour;
    //     return $hour.":".$minute.":".$second;
    // }

    // public function generatehls($conn_id,$video,$name){
    //     $video_name = md5((round(microtime(true) * 1000)))."_".$video['name'];
    //     $file = explode(".", $name);
    //     $link = 'asset/hls/'.$file[0];
    //     $output=shell_exec("/usr/bin/ffmpeg -i ".$video['tmp_name']." -codec copy -c:v libx264 -preset veryfast -profile:v baseline -vsync cfr -s 160x120 -b:v 400k -bufsize 400k  -map 0 -f segment -vbsf h264_mp4toannexb -flags -global_header -segment_format mpegts -segment_list ".$link.".m3u8 2>&1 -segment_time 10 ".$link."-%03d.ts ");
    //     if (!ftp_put($conn_id, '/home/cnnftpvcp/hls/'.$file[0].".m3u8", $link.".m3u8", FTP_BINARY)) {
    //         return false;
    //     } else {
    //         //change mod 644 to m3u8
    //         ftp_chmod($conn_id, 0644, '/home/cnnftpvcp/hls/'.$file[0].".m3u8");
    //         for($i = 0; $i < 100; $i++){
    //             if($i < 10) $number = '00'.$i;
    //             else if($i >= 10 && $i < 100) $number = '0'.$i;
    //             $upload = $file[0].'-'.$number.".ts";
    //             if(file_exists("asset/hls/".$upload)){
    //                 $upload_file = '/home/cnnftpvcp/hls/'.$upload;
    //                 $source = "asset/hls/".$upload;
    //                 if(!ftp_put($conn_id, $upload_file, $source, FTP_BINARY)){
    //                     return false;
    //                 } else {
    //                     //change mod 644 to ts
    //                     ftp_chmod($conn_id, 0644, $upload_file);
						
						
    //                 }
    //             } else break;
    //         }
    //         return true;
    //     }
    // }
}