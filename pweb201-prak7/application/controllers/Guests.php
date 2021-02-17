<?php
/**
 *
 */
class Guests extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('guests_model');
  }

  public function guestslist($bulan = '')
  {
    if ($bulan == '') {
      $where = '';
    } else {
      $where = "MONTH(date_in) LIKE " .$bulan. "";
    }

    $data['judul'] = "Guests List";
    $data['title'] = "Daftar Bulan";
    $data['guests'] = $this->guests_model->guestsList($where);

    $this->load->view("layout/header");
    $this->load->view("guestslist", $data);
    $this->load->view("layout/footer");
  }
}

 ?>
