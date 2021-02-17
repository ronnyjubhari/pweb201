<?php


 class Room_model extends CI_Model
 {

   public function __construct()
   {
     parent::__construct();
   }


  public function roomlist()
   {
     //sql Query
     $sql = "SELECT rooms.room,roomtype.rtype,views.dview,(roomtype.rate * views.addv)+roomtype.rate AS Total_harga
              FROM `rooms`
              INNER JOIN roomtype ON rooms.rtype = roomtype.kode
              INNER JOIN views ON rooms.dview = views.vcode";
     $query = $this->db->query( $sql );
     return $query->result_array();
   }

 }
