<?php

namespace App\Models;
use CodeIgniter\Model;

class M_absen extends Model
{

		public function tampil($table,$by){
		return $this->db->table($table)
						->orderby($by,'asc')
						->get()
						->getResult();
	}
		public function absiswa(){
		return $this->db->table('absensi_siswa')
						 ->select('absensi_siswa.*, siswa.nis, siswa.nama_siswa, kelas.nama_kelas')
						 ->join('siswa', 'siswa.id_siswa = absensi_siswa.id_siswa')
						 ->join('kelas', 'siswa.id_kelas = kelas.id_kelas')
						 ->get()
						 ->getResult();
		}
		public function abguru(){
			return $this->db->table('absensi_guru')
							 ->select('absensi_guru.*, guru.nik, guru.nama_guru, kelas.nama_kelas')
							 ->join('guru', 'guru.id_guru = absensi_guru.id_guru')
							 ->join('kelas', 'guru.id_kelas = kelas.id_kelas')
							 ->get()
							 ->getResult();
			}

	public function hei($table,$by, $where){
		return $this->db->table($table)
						->orderby($by,'asc')
						->where($where)
						->get()
						->getResult();
	}
	public function join($table, $table2, $on){
		return $this->db->table($table)
						->join($table2,$on)
						->get()
						->getResult();
	}
	public function join2($table, $table2, $table3, $on, $on2){
		return $this->db->table($table)
						->join($table2,$on)
						->join($table3,$on2)
						->get()
						->getResult();
	}
	public function join3(){
		return $this->db->table('jadwal')
						->join('kelas','jadwal.id_kelas=kelas.id_kelas')
						->join('mapel','jadwal.id_mapel=mapel.id_mapel')
						->join('guru','jadwal.id_guru=guru.id_guru')
						->get()
						->getResult();
	}
	
	public function joinsiswa (){
		return $this->db->table('siswa')
						->join('user', 'siswa.id_user=user.id_user')
						->join('kelas', 'siswa.id_kelas=kelas.id_kelas')
                        ->where('siswa.nis', $nis) // Tambahkan filter berdasarkan NIS
                        ->first(); // Ambil satu data saja
	}
	public function absensiswa(){
		return $this->db->table('absensi_siswa')
						->join('siswa','absensi_siswa.id_siswa=siswa.id_siswa')
						->join('kelas', 'siswa.id_kelas=kelas.id_kelas')
						->get()
						->getResult();
	}

	public function absenguru(){
		return $this->db->table('absensi_guru')
						->join('guru','absensi_guru.id_guru=guru.id_guru')
						->get()
						->getResult();
	}
	public function siswakelas(){
		return $this->db->table('siswa')
						->join('kelas','siswa.id_kelas=kelas.id_kelas')
						->get()
						->getResult();
	}
	public function filtersiswa(){
		return $this->db->table('absensi_siswa')
						->join('jadwal','absensi_siswa.id_jadwal=jadwal.id_jadwal')
						->join('siswa','absensi_siswa.id_siswa=siswa.id_siswa')
						->join('mapel','jadwal.id_mapel=mapel.id_mapel')
						->join('guru', 'jadwal.id_guru=guru.id_guru')
						->join('kelas', 'siswa.id_kelas=kelas.id_kelas')
						->where('tanggal >=', $a)
						->where('tanggal <=',$b)
						->get()
						->getResult();
	}

	public function filterguru(){
		return $this->db->table('absensi_guru')
						->join('jadwal','absensi_guru.id_jadwal=jadwal.id_jadwal')
						->join('guru','absensi_guru.id_guru=guru.id_guru')
						->where('tanggal >=', $a)
						->where('tanggal <=',$b)
						->get()
						->getResult();
	}

	public function filterkelas($a)
{
    	return $this->db->table('siswa')
                        ->select('siswa.*, kelas.nama_kelas')
                        ->join('kelas', 'siswa.id_kelas = kelas.id_kelas')
                        ->where('siswa.id_kelas', $a)
						->get()
						->getResult();

}
	
	public function kelas(){
		return $this->db->table('kelas')
						->orderby('id_kelas','asc')
						->get()
						->getResult();
	}

	public function jwhere($table, $table2, $on,$where){
		return $this->db->table($table)
						->join($table2,$on)
						->where($where)
						->get()
						->getResult();
	}
	public function guru(){
		return $this->db->table('guru')
						->join('user','guru.id_user=user.id_user')
						->get()
						->getResult();
	}
	public function siswa(){
		return $this->db->table('siswa')
						->join('user','siswa.id_user=user.id_user')
						->get()
						->getResult();
	}
	public function jwhere1($table, $table2, $on,$where){
		return $this->db->table($table)
						->join($table2,$on)
						->where($where)
						->get()
						->getRow();
	}
	public function getUsernameById($id) {
    $result = $this->db->table('user')
        ->select('username')
        ->where('id_user', $id)
        ->get()
        ->getRow();

    return $result ? $result->username : 'Unknown User';
}

	public function create($data){
		$query = $this->db->table($this->table)
						  ->insert($data);
						  return $query;
	}
	
	public function input($table, $data){
		return $this->db->table($table)
						->insert($data);
	}

	public function hapus($table, $where){
		return $this->db->table($table)
						->delete($where);
	}
	public function getWhere($table, $where){
		return $this->db->table($table)
						->getWhere($where)
						->getRow();
	}
	public function getGuruByAbsensi($id_guru)
{
    return $this->db->table('guru')
        ->select('guru.*')
        ->join('absensi_guru', 'absensi_guru.id_guru = guru.id_guru')
        ->where('absensi_guru.id_guru', $id_guru)
        ->get()
        ->getResult();
}
public function log_activity($id, $activity) 
{
    date_default_timezone_set('Asia/Jakarta');
    $data = [
        'id_user' => $id,
        'what_happens' => $activity,
        'ip_address' => file_get_contents("https://api.ipify.org"),
        'happens_at' => date('Y-m-d H:i:s')
    ];
    
    return $this->db->table('log_activity')
                    ->insert($data);
}


public function getSiswaByAbsensi($id_siswa)
{
    return $this->db->table('siswa')
        ->select('siswa.*, absensi_siswa.jam_absen, absensi_siswa.status')
        ->join('absensi_siswa', 'absensi_siswa.id_siswa = siswa.id_siswa')
        ->where('absensi_siswa.id_siswa', $id_siswa)
        ->get()
        ->getRow();
}

	public function getWheree($table, $where){
		return $this->db->table($table)
						->getWhere($where)
						->getResult();
	}
	public function getWhere2($table, $where){
		return $this->db->table($table)
						->getWhere($where)
						->getRowArray();
	}
	public function edit($table,$data,$where){
		return $this->db->table($table)
						->update($data,$where);
	}
	public function joinw($table, $table2, $on, $w){  
		return $this->db->table($table)
						->join($table2,$on)
						->where($w)
						->get()
						->getRow();
	}
	public function joinwall($table, $table2, $on, $w){  
		return $this->db->table($table)
						->join($table2,$on)
						->where($w)
						->get()
						->getResult();
	}
	public function tampiluser($table,$by){
		return $this->db->table($table)
						->orderBy($by,'asc')
						->where('user.kondisi', 0)
						->get()
						->getResult();
	}
}