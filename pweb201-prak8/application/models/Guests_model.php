<?php
/**
 *
 */
class Guests_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function daftar_tamu()
  {
    /* SQL:
      SELECT * FROM `guests`
      LEFT JOIN members USING(member_ID)
      WHERE date_out IS NULL
    */

    $this->db->join('members', 'member_ID');
    $this->db->join('country', 'ON(country.CC=members.negara)');
    $this->db->where('date_out IS NULL');
    $this->db->order_by('date_in','desc');
    $query = $this->db->get('guests');
    return $query->result();
  }

  private function tambahNol($nilai, $digit)
  {
    return str_repeat('0', $digit - strlen($nilai) ) . $nilai;
  }

  public function guestbill($id)
  {
    /* SQL
      SELECT
        m.*, c.Country, g.room, DATEDIFF(NOW(), g.date_in) jml_hari,
        t.rate+(t.rate*v.addv) finalrate,
      (t.rate+(t.rate*v.addv)) * DATEDIFF(NOW(), g.date_in) tagihan
      FROM guests g
      LEFT JOIN members m USING(member_ID)
      LEFT JOIN rooms r USING(room)
      LEFT JOIN roomtype t ON(r.rtype=t.kode)
      LEFT JOIN views v ON(r.dview=v.vcode)
      WHERE member_ID='05001635'
      AND date_out IS NULL
      LIMIT 1
    */

    $this->db->select('m.*, c.Country, g.room, t.*, v.dview');
    $this->db->select('DATEDIFF(NOW(), g.date_in) jml_hari');
    $this->db->select('t.rate+(t.rate*v.addv) finalrate');
    $this->db->select('(t.rate+(t.rate*v.addv)) * DATEDIFF(NOW(), g.date_in) tagihan');
    $this->db->join('members m', 'member_ID', 'LEFT');
    $this->db->join('country c', 'c.CC=m.negara', 'LEFT');
    $this->db->join('rooms r', 'room', 'LEFT');
    $this->db->join('roomtype t', 'r.rtype=t.kode', 'LEFT');
    $this->db->join('views v', 'r.dview=v.vcode', 'LEFT');
    $this->db->where( ['member_ID' => $id] );
    $this->db->where('date_out IS NULL');

    $query = $this->db->get('guests g');
    return $query->result()[0];

  }

  public function checked_out($where)
  {
    /* SQL
      UPDATE guests SET date_out=CURRENT_DATE()
      WHERE member_ID='xxxxxxxxxx' AND date_out IS NULL
    */

    $this->db->where($where);
    $checkoutOK = $this->db->update('guests', 'date_out=CURRENT_DATE()');

    if( $checkoutOK ){
      return $where['member_ID'];
    } else {
      return FALSE;
    }
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

  // public function guestlist()
  // {
  //   /* SELECT * FROM guests
  //     INNER JOIN members m USING(member_ID)
  //     INNER JOIN country c ON (m.negara = c.CC)
  //     INNER JOIN rooms r USING(room)
  //     INNER JOIN roomtype rt ON (r.rtype = rt.kode)
  //     where date_out IS NULL;
  //   */
  //
  //   $this->db->select('*');
  //   $this->db->from('guests');
  //   $this->db->join('members m', 'member_ID');
  //   $this->db->join('country c', 'm.negara = c.CC');
  //   $this->db->join('rooms r', 'room');
  //   $this->db->join('roomtype rt', 'r.rtype = rt.kode');
  //   $this->db->where('date_out IS NULL');
  //
  //   $query = $this->db->get();
  //   return $query->result();
  // }
}
?>
