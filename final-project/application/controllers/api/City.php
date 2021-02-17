<?php
use Restserver\Libraries\REST_Controller;

class City extends REST_Controller
{

  function __construct()
  {
    parent::__construct();
    header("Access-Control-Allow-Origin: *");
    $this->load->model('city_model');
  }

  public function citylist_get()
  {
    $data  = $this->city_model->daftar_kota();
    $this->response( [ 'kota' => $data ], 200 );
  }
  
}

 ?>
