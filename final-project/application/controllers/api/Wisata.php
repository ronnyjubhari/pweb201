<?php
use Restserver\Libraries\REST_Controller;

class Wisata extends REST_Controller
{

  function __construct()
  {
    parent::__construct();
    header("Access-Control-Allow-Origin: *");
    $this->load->model('wisata_model');
  }

  public function wisatalist_get()
  {
    $data  = $this->wisata_model->daftar_wisata();
    $this->response( [ 'wisata' => $data ], 200 );
  }

  public function detail_get()
  {
    $id = $this->get('id');
    $data  = $this->wisata_model->daftar_wisata($id);
    $this->response( [ 'wisata' => $data ], 200 );
  }
}

 ?>
