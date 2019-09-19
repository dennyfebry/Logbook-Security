<?php
class logbook_model extends CI_Model{
    
    //ambil data mahasiswa dari database
    function get_laporan_list($limit, $start){
  //   	$this->db->order_by("tanggal", "desc");
		// $query = $this->db->get('laporan',$limit, $start); 
		// return $query;
        $query = $this->db->get('laporan', $limit, $start);
        return $query;
    }
} 