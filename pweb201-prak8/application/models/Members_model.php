<?php
/**
 *
 */
class Members_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function daftar_negara()
  {
    /* SQL
      SELECT * FROM `country`
    */

    $query = $this->db->get('country');
    return $query->result();
  }

  public function daftar_members()
  {
    $this->db->join('country', 'ON(country.CC=members.negara)');
    $query = $this->db->get('members');
    return $query->result();
  }

  public function memberDetail($id)
  {
    /* SQL
    SELECT * FROM `members`
    LEFT JOIN country ON(members.negara=country.CC)
    WHERE members.member_ID='05000037'
    */

    $where = [ 'member_ID' => $id ];

    $this->db->join('country', 'ON(members.negara=country.CC)');
    $this->db->where($where);
    $query = $this->db->get('members');
    return $query->result()[0];

  }

  public function insertMember($data)
  {
    $data['member_ID'] = $this->newMemberId();
    $insertOK = $this->db->insert('members', $data);

    if( $insertOK ){
      return $data['member_ID'];
    } else {
      return FALSE;
    }
  }

  public function newMemberId()
  {
    /* SQL:
      SELECT RIGHT(member_ID, 6) reg
      FROM `members`
      ORDER BY member_ID DESC
      LIMIT 1
    */
    $this->db->select('RIGHT(member_ID, 6) reg');
    $this->db->order_by('member_ID','DESC');
    $this->db->limit(1);
    $query = $this->db->get('members');

    $lastID = $query->result()[0];
    $newID = date('y') . $this->tambahNol($lastID->reg + 1, 6);
    return $newID;
  }

  public function checked_in($data)
  {
    $data['date_in'] = date('Y-m-d');
    $checkinOK = $this->db->insert('guests', $data);

    if( $checkinOK ){
      return $data['member_ID'];
    } else {
      return FALSE;
    }
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

  // public function memberlist()
  // {
  //   // semua daftar member
  //   /* SELECT * FROM members m
  //      join country c
  //      ON m.negara = c.CC;
  //   */
  //
  //   $this->db->select('*');
  //   $this->db->from('members m');
  //   $this->db->join('country c', 'ON(m.negara = c.CC)');
  //
  //   $query = $this->db->get();
  //   return $query->result();
  // }

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
