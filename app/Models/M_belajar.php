<?php

namespace App\Models;
use CodeIgniter\Model;

class M_belajar extends Model
{
	protected $table = 'absensi_siswa';
    protected $primaryKey = 'id_absensiswa';
    protected $allowedFields = ['id_siswa', 'id_kelas', 'tanggal', 'status'];

	protected $table1 = 'barang';
	protected $table2 = 'barang_keluar';
	protected $table3 = 'barang_masuk';
	protected $table4 = 'barang_rusak';
	protected $table5 = 'karyawan';
	protected $table6 = 'user';
	protected $table7 = 'siswa';
	protected $table8 = 'guru';
	protected $table9 = 'kelas';
	protected $table10 = 'mapel';
	protected $table11 = 'jadwal';
	protected $table12 = 'absensi_guru';

	public function tampil($table, $by){
		return $this->db->table($table)
						->orderby($by, 'asc')
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
	public function join($table, $table2, $on, $orderby){
		return $this->db->table($table)
						->orderby($orderby, 'desc')
						->join($table2, $on)
						->get()
						->getResult();
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
	public function filter($table, $table2, $on, $filter1, $filter2, $awal, $akhir, $orderby)
	{
		return $this->db->table($table)
						->orderby($orderby, 'desc')
						->join($table2, $on)
						->where($filter1, $awal)
						->where($filter2, $akhir)
						->get()
						->getResult();
	}

	public function joinw($table, $table2, $on, $w){
		return $this->db->table($table)
						->join($table2, $on) // ✅ Menghapus koma yang tidak perlu
						->where($w)
						->get()
						->getRow();
	}

	public function hapus($table, $where){
		return $this->db->table($table)
						->delete($where);
	}

	public function input($table, $data){
		return $this->db->table($table)
						->insert($data);	
	}

	public function getWhere($table, $where){
		return $this->db->table($table)
						->getWhere($where)
						->getRow();
	}

	public function edit($table, $data, $where)
	{
		return $this->db->table($table)
						->update($data, $where);
	}

	public function filtersiswa($c, $a, $b)
	{
		return $this->db->table('absensi_siswa')
					->select('siswa.nama_siswa, kelas.nama_kelas, absensi_siswa.tanggal, absensi_siswa.status')
					->join('siswa', 'absensi_siswa.id_siswa = siswa.id_siswa')
					->join('kelas', 'siswa.id_kelas = kelas.id_kelas')
					->where('siswa.id_kelas', $c)
					->where('absensi_siswa.tanggal >=', $a)
					->where('absensi_siswa.tanggal <=', $b)
					->get()
					->getResultArray();
	}

	public function filterguru($a, $b)
	{
		return $this->db->table('absensi_guru')
					->select('guru.nama_guru, absensi_guru.tanggal, absensi_guru.status')
					->join('guru', 'absensi_guru.id_guru = guru.id_guru')
					->join('jadwal', 'absensi_guru.id_jadwal = jadwal.id_jadwal')
					->where('absensi_guru.tanggal >=', $a)
					->where('absensi_guru.tanggal <=', $b)
					->get()
					->getResultArray();
	}

	public function simpan_barang($data)
	{
		return $this->db->table($this->table1)->insert($data);
	}

	public function simpan_barangm($data)
	{
		return $this->db->table($this->table3)->insert($data);
	}

	public function simpan_barangk($data)
	{
		return $this->db->table($this->table2)->insert($data);
	}

	public function simpan_barangr($data)
	{
		return $this->db->table($this->table4)->insert($data);
	}

	public function simpan_user($data)
	{
		return $this->db->table($this->table6)->insert($data);
		 return $this->db->insertID();
	}

	public function simpan_karyawan($data)
	{
		return $this->db->table($this->table5)->insert($data);
	}

	public function simpan_siswa($data)
	{
		return $this->db->table($this->table7)->insert($data);
	}

	public function simpan_guru($data)
	{
		return $this->db->table($this->table8)->insert($data);
	}

	public function simpan_kelas($data)
	{
		return $this->db->table($this->table9)->insert($data);
	}

	public function simpan_mapel($data)
	{
		return $this->db->table($this->table10)->insert($data);
	}

	public function simpan_jadwal($data)
	{
		return $this->db->table($this->table11)->insert($data);
	}

	public function simpan_absensiguru($data)
	{
		return $this->db->table($this->table12)->insert($data);
	}	
}
