<?php
use Restserver\Libraries\REST_Controller;

/**
 *
 */
class Rooms extends REST_Controller
{

  function __construct()
  {
    parent::__construct();
    header("Access-Control-Allow-Origin: *");
    $this->load->model('room_model');
  }

  public function roomlist_get()
  {
    $data  = $this->room_model->daftar_kamar();
    $this->response( [ 'rooms' => $data ], 200 );
  }

  public function roomrate_get()
  {
      $data = $this->room_model->roomrate();
      $this->response( [ 'rates' => $data ], 200 );
  }

  public function roomcountbytype_get()
  {
      $data = $this->room_model->roomcount();
      $this->response( [ 'rooms' => $data ], 200 );
  }

  public function jumlahkamar_get()
  {
    $data  = $this->room_model->roomcount();
    $this->response( [ 'rooms' => $data ], 200 );
  }

  public function roomavailable_get()
  {
    $data  = $this->room_model->roomAvailable();
    $this->response( [ 'rooms' => $data ], 200 );
  }

  // public function roomslist_get()
  // {
  //     $where = '';
  //     if (null !== $this->get('lt')) {
  //       $lantai = $this->get('lt');
  //       $where = "room LIKE '" . $lantai . "__%'";
  //     }
  //
  //     $data = $this->room_model->roomList( $where );
  //     $this->response( [ 'rooms' => $data ], 200 );
  // }

  public function test_get()
  {
    $msg = $this->get('msg');
    $this->response( [ 'response' => [
                                      'status' => 'OK',
                                      'msg' => $msg
                                     ]
                     ], 200 );
  }
}

 ?>
