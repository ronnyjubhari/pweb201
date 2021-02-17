<?php
/**
 *
 */
class Wisata_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function wisatalist($where = '')
  {
    /* SELECT nama_wisata, lokasi, operasional, tiket, fasilitas, deskripsi
    FROM objek o
    INNER JOIN kota k ON (o.City = k.k_code)
    */
    // semua daftar Tempat Wisata

    $this->db->select('nama_wisata, lokasi, operasional, tiket, fasilitas, deskripsi');
    $this->db->join('kota k', 'o.City = k.k_code');
    if ($where != '') $this->db->where($where);
    $query = $this->db->get('objek o');
    return $query->result_array();
  }

  public function getCityList()
  {
    //semua daftar Kota

    $this->db->select('City, COUNT(*) duplikat, k.nama_kota');
    $this->db->join('kota k', 'o.City = k.k_code');
    $this->db->group_by("City");
    $this->db->having("COUNT(duplikat) > 1");

    $query = $this->db->get('objek o');
    return $query->result_array();
  }

  public function daftar_wisata($id)
  {
    /* SQL
    SELECT * FROM `objek`
    LEFT JOIN kota k ON(objek.City = k.k_code)
    WHERE nama_kota = 'Makassar'
    */

    $where = [ 'k_code' => $id ];

    $this->db->join('kota k', 'ON(o.City = k.k_code)');
    $this->db->where($where);
    $query = $this->db->get('objek o');
    return $query->result_array();
  }

}
?>
