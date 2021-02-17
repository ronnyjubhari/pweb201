<?php
/**
 *
 */
class Guests_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function guestsList($where = '')
  {
    // semua daftar tamu
    $this->db->select('nama, room, rt.rtype, date_in, date_out, Country');
    $this->db->join('members m', 'member_ID');
    $this->db->join('country c', 'm.negara = c.CC');
    $this->db->join('rooms r', 'room');
    $this->db->join('roomtype rt', 'r.rtype = rt.kode');
    $this->db->order_by('date_in','asc');
    if ($where != '') $this->db->where($where);
    $query = $this->db->get( 'guests' );
    return $query->result_array();
  }

}
?>
