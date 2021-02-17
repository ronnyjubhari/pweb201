<?php
/**
 *
 */
class Room_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
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
