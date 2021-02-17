<?php
/**
 *
 */
class City extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('city_model');
  }

  public function citylist()
  {
    $data['judul'] = "Daftar Kota";
    $data['kota'] = $this->city_model->getCityList();

    $this->load->view("layout/header");
    $this->load->view("citylist", $data);
    $this->load->view("layout/footer");
  }
}

 ?>
