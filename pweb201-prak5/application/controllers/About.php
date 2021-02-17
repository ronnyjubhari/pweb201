<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller
{
  
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
  }

  public function saya() {
    $this->load->view('about/tentang_saya');
  }

  public function kharisma() {
    $this->load->view('about/tentang_kharisma');
  }

  public function desainweb() {
    $this->load->view('about/desainweb');
  }

}
