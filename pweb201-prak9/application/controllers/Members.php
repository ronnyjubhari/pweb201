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

  public function login($stat = 0)
  {
    $data = ['stat' => $stat];
    $this->load->view('layout/header');
    $this->load->view('loginform', $data );
    $this->load->view('layout/footer');
  }

  public function auth()
  {
    $data = [
              'username' => $this->input->post('username'),
              'userpass' => md5($this->input->post('password'))
            ];

    $member = $this->members_model->memberOk($data);
    if ( count($member)>0 ) {
      setcookie('member_ID', $member['member_ID']);
      setcookie('member_name', $member['nama']);
      redirect('/');
    } else {
      redirect('/login/1');
    }
  }

  public function logout()
  {
    setcookie('member_ID');
    setcookie('member_name');
    redirect('/');
  }

}

 ?>
