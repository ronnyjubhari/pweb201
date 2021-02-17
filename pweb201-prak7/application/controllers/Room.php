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

  public function roomlist($lantai = '')
  {
    if ($lantai == '') {
      $where = '';
    } else {
      $where = "room LIKE '" .$lantai. "__%'";
    }

    $data['judul'] = "Room List";
    $data['title'] = "Daftar Lantai";
    $data['rooms'] = $this->room_model->roomList($where);

    $this->load->view("layout/header");
    $this->load->view("roomlist", $data);
    $this->load->view("layout/footer");
  }
}

 ?>
