<?php
/**
 *
 */
class Room_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function daftar_kamar($value='')
  {
    /* SELECT r.room, t.rtype, v.dview, t.rate
       FROM rooms r
       LEFT JOIN roomtype t ON (r.rtype=t.kode)
       LEFT JOIN views v ON (r.dview=v.vcode)
    */

    $this->db->select('r.room, t.rtype, v.dview, t.rate, t.rate + (t.rate * addv) vrate');
    $this->db->from('rooms r');
    $this->db->join('roomtype t', 'ON(r.rtype = t.kode)');
    $this->db->join('views v', 'ON(r.dview = v.vcode)');

    $query = $this->db->get();
    return $query->result();
  }

  public function roomrate()
  {
    /* SQL:
     SELECT * FROM roomtype
    */

    $query = $this->db->get('roomtype');
    return $query->result();
  }

  public function roomcount()
  {
    /* SQL:
    SELECT t.rtype, t.rate, COUNT(*) jumlah_kamar
    FROM rooms r
    LEFT JOIN roomtype t ON (r.rtype=t.kode)
    GROUP BY r.rtype
    */

    $this->db->select('t.rtype, t.rate, COUNT(*) Jumlah_Kamar');
    $this->db->from('rooms r');
    $this->db->join('roomtype t', 'ON(r.rtype = t.kode)');
    $this->db->group_by('r.rtype');

    $query = $this->db->get();
    return $query->result();
  }

  public function roomAvailable()
  {
    /* SQL:
    SELECT r.room, t.rtype, v.dview, t.rate
    FROM rooms r
    LEFT JOIN views v ON (r.dview=v.vcode)
    LEFT JOIN roomtype t ON (r.rtype=t.kode)
    WHERE r.room NOT IN (SELECT room FROM `guests` WHERE date_out IS NULL)
    */
    $this->db->select('r.room, v.dview, t.rate, t.rate+(t.rate*v.addv) vrate');
    $this->db->join('roomtype t', 'ON(r.rtype=t.kode)');
    $this->db->join('views v', 'ON(r.dview=v.vcode)');
    $this->db->where('r.room NOT IN (SELECT room FROM `guests` WHERE date_out IS NULL)');
    $query = $this->db->get('rooms r');
    return $query->result();
  }

  public function roomList($where = '')
  {
    /*SELECT rm.room, rt.rtype, rv.dview, rate + (rate*addv) frate, MAX(date_in) date_in,
    CASE WHEN MAX(COALESCE(date_out, "NULL")) = "NULL" THEN "NULL" ELSE MAX(date_out) END AS date_out,
    CASE WHEN MAX(COALESCE(date_out, "NULL")) = "NULL" THEN "Unavailable" ELSE "Available" END AS Informasi
    FROM rooms rm
    JOIN guests g USING (room)
    JOIN roomtype rt ON (rm.rtype = rt.kode)
    JOIN views rv ON (rm.dview = rv.vcode)
    GROUP BY rm.room;

    SELECT room, rt.rtype, rv.dview, date_in, date_out,
    CASE WHEN date_out IS NOT NULL THEN "Available" ELSE "Unavailable" END AS Informasi
    FROM rooms rm
    INNER JOIN guests USING (room)
    INNER JOIN roomtype rt ON (rm.rtype = rt.kode)
    INNER JOIN views rv ON (rm.dview = rv.vcode)
    WHERE date_out IS NOT NULL
    ORDER BY room ASC
    */
    // semua daftar kamar

    $this->db->select('rm.room, rt.rtype, rv.dview, rate + (rate*addv) frate, MAX(date_in) date_in');
    $this->db->select('CASE WHEN MAX(COALESCE(date_out, "NULL")) = "NULL" THEN "NULL" ELSE MAX(date_out) END AS date_out');
    $this->db->select('CASE WHEN MAX(COALESCE(date_out, "NULL")) = "NULL" THEN "Terisi" ELSE "Kosong" END AS Informasi');
    $this->db->join('guests g', 'room');
    $this->db->join('roomtype rt', 'rm.rtype = rt.kode');
    $this->db->join('views rv', 'rm.dview = rv.vcode');
    $this->db->group_by('rm.room');
    if ($where != '') $this->db->where($where);
    $query = $this->db->get( 'rooms rm' );
    return $query->result_array();
  }
}
?>
