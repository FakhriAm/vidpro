<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('part/header');
$this->load->view('part/sidebar');
$this->load->view($content);
$this->load->view('part/js');
if(isset($content_js)) $this->load->view($content_js);
$this->load->view('part/footer');
?>