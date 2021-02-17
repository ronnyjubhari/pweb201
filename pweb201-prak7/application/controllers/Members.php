<?php
/**
 *
 */
class Members extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('members_model');
  }

  public function memberslist( $negara = '')
  {
    if ($negara == '') {
      $where = '';
    } else {
      $where = "negara = '".$negara."'";
    }

    $data['judul'] = "Members List";
    $data['title'] = "Daftar Negara";
    $data['members'] = $this->members_model->memberslist($where);
    $data['negara'] = $this->members_model->getCountryList();

    $this->load->view("layout/header");
    $this->load->view("memberslist", $data);
    $this->load->view("layout/footer");
  }
}

 ?>
