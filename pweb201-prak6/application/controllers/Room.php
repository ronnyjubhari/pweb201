<?php

/**
 *
 */
class Room extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('room_model');
  }


  public function roomlist()
  {
    $data['rooms'] = $this->room_model->roomlist();

    $this->load->view( "roomlist",$data );
  }
}
