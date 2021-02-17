<?php
use Restserver\Libraries\REST_Controller;

/**
 *
 */
class Members extends REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('members_model');
  }

  public function memberslist_get()
  {
    $data  = $this->members_model->daftar_members();
    $this->response( [ 'members' => $data ], 200 );
  }

  public function detail_get()
  {
    $id = $this->get('id');
    $data  = $this->members_model->memberDetail($id);
    $this->response( [ 'members' => $data ], 200 );
  }

  public function countrylist_get()
  {
    $data = $this->members_model->daftar_negara();
    $this->response( [ 'countries' => $data ], 200 );
  }

  public function newmember_post()
  {
    var_dump($this->input->post());
    $data = json_decode($this->post()[0], true);
    $ok = $this->members_model->insertMember($data);

    if( $ok ) {
      $this->response( ['status'=>'OK', 'member_ID'=> $ok ], 200 );
    } else {
      $this->response( ['status'=>'Failed'], 500 );
    }
  }

  public function checkedin_post()
  {
    $where = json_decode($this->post()[0], true);
    $ok = $this->members_model->checked_out($where);

    if( $ok ) {
      $this->response( ['status'=>'OK', 'member_ID'=> $ok ], 200 );
    } else {
      $this->response( ['status'=>'Failed'], 500 );
    }
  }

}

 ?>
