<?php
/**
 *
 */
class Wisata extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('wisata_model');
  }

  public function wisatalist( $kota = '')
  {
    if ($kota == '') {
      $where = '';
    } else {
      $where = "City = '".$kota."'";
    }

    $data['judul'] = "Daftar Wisata";
    $data['title'] = "Daftar Kota";
    $data['wisata'] = $this->wisata_model->wisatalist($where);
    $data['kota'] = $this->wisata_model->getCityList();

    $this->load->view("layout/header");
    $this->load->view("wisatalist", $data);
    $this->load->view("layout/footer");
  }
}

 ?>
