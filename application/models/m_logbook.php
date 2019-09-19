<?php
class m_logbook extends CI_Model {

	public function log() {
		$sql = $this->db->query("SELECT * FROM laporan" );
		return $sql;
	}

	public function log_id($id) {
		$this->db->where("id",$id);
		$sql = $this->db->query("SELECT * FROM laporan WHERE id = $id;");
		return $sql;	
	}

	public function log_id_k($id) {
		$this->db->where("id",$id);
		$sql = $this->db->query("SELECT * FROM keterangan WHERE id = $id; ");
		return $sql;	
	}


	function simpan_petugas($data){
		$this->db->insert('laporan',$data);
	}

	function simpan_kegiatan($data){
		$this->db->insert('keterangan',$data);
	}

	function hapus_id($id){
		$this->db->where("id",$id);
		$this->db->delete('laporan');
	}

	function hapus_id_k($id_k){
		$this->db->where("id_k",$id_k);
		$this->db->delete('keterangan');
	}

	function edit_id($id){
		$this->db->where("id",$id);
		return $this->db->get('laporan');
	}

	function edit_id_k($id_k){
		$this->db->where("id_k",$id_k);
		return $this->db->get('keterangan');
	}

	function update_petugas($id,$data){
		$this->db->where("id",$id);
		$this->db->update('laporan',$data);
	}

	function update_kegiatan($id_k,$data){
		$this->db->where("id_k",$id_k);
		$this->db->update('keterangan',$data);
	}

	function search($date1,$date2){
		$this->db->where('tanggal',$date1);
		$this->db->where('tanggal',$date2);
        $sql = $this->db->query("SELECT * FROM laporan WHERE tanggal between '$date1' and '$date2' ");
        return $sql;
    }
}
