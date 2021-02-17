<?php
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Content-Type: application/json");

class Guests extends REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('guests_model');
  }

  public function guestslist_get()
  {
      $data = $this->guests_model->daftar_tamu();
      $this->response( [ 'guests' => $data ], 200 );
  }

  public function guestbill_get()
  {
    $id = $this->get('id');
    $data  = $this->guests_model->guestbill( $id );
    $this->response( [ 'guest' => $data ], 200 );
  }

  public function checkedout_post()
  {
    $data = json_decode($this->post()[0], true);
    $ok = $this->guests_model->checked_out($data);
    // var_dump($data);
    if( $ok ) {
      $this->response( ['status'=>'OK', 'member_ID'=> $ok ], 200 );
    } else {
      $this->response( ['status'=>'Failed'], 500 );
    }
  }

}

 ?>
