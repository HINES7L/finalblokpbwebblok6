<?php 
namespace App\Models;
use CodeIgniter\Model;

class M_guru extends Model
{
    protected $table = 'guru'; // Nama tabel di database
    protected $primaryKey = 'id_guru'; // Primary key (kalau beda, sesuaikan)
    protected $allowedFields = ['nik', 'code']; // Kolom yang bisa di-update

    public function getUserByNIK($nik)
    {
        return $this->db->table('guru')
            ->select('guru.*, user.*') // Pilih semua kolom yang diperlukan
            ->join('user', 'guru.id_user = user.id_user', 'left')
            ->where('guru.nik', $nik)
            ->get()
            ->getRow(); // Pastikan hanya satu hasil yang diambil
    }
    
public function updateQRguru($nik, $fileName)
{
    return $this->db->table('guru')
        ->where('nik', $nik)
        ->update(['code' => $fileName]);
}


    public function join2($table, $table2, $table3, $on, $on2){
		return $this->db->table($table)
						->join($table2,$on)
						->join($table3,$on2)
						->get()
						->getResult();
	}
    public function joinsiswa (){
		return $this->db->table('siswa')
						->join('user', 'siswa.id_user=user.id_user')
						->join('kelas', 'siswa.id_kelas=kelas.id_kelas')
                        ->where('siswa.nis', $nis) // Tambahkan filter berdasarkan NIS
                        ->get()
						->getRow();
                        echo $query->getCompiledSelect(); die; // Cek query SQL yang dijalankan
                        $wendy['anjas'] = $query->get()->getRow();

	}
}
?>