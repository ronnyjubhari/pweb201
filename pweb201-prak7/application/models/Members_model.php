<?php
/**
 *
 */
class Members_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function memberslist($where = '')
  {
    // semua daftar member
    // $this->db->select('member_ID, nama, kota, Country, telepon, hp');
    // $this->db->join('country c', 'm.negara = c.CC');
    // if ($where != '') $this->db->where($where);
    // $query = $this->db->get( 'members m' );
    // return $query->result_array();
    $this->db->select('member_ID, nama, kota, Country, telepon, hp');
    $this->db->join('country c', 'ON(m.negara = c.CC)');
    if ($where != '') $this->db->where($where);
    $query = $this->db->get('members m');
    return $query->result_array();
  }

  public function getCountryList()
  {
    //semua daftar Negara
    // $this->db->select('Country');
    // $query = $this->db->get( 'country');
    // return $query->result_array();
    $this->db->select('negara, COUNT(*) duplikat, c.Country');
    $this->db->join('country c', 'ON(m.negara = c.CC)');
    $this->db->group_by("negara");
    $this->db->having("COUNT(duplikat) > 1");

    $query = $this->db->get('members m');
    return $query->result_array();
  }
}
?>
