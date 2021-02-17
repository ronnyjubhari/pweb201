<?php
/**
 *
 */
class City_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function getCityList()
  {
    /* SELECT nama_kota
    FROM kota
    */
    // semua daftar Tempat Wisata

    $this->db->select('nama_kota');
    $query = $this->db->get('kota');
    return $query->result_array();
  }

  public function daftar_kota()
  {
    /* SQL
      SELECT * FROM `kota k`
    */

    $query = $this->db->get('kota k');
    return $query->result();
  }

}
?>
