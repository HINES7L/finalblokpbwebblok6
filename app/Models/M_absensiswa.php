<?php 
namespace App\Models;
use CodeIgniter\Model;

class M_absensiswa extends Model
{
    protected $table = 'absensi_siswa';
    protected $primaryKey = 'id_absensiswa';
    protected $allowedFields = ['id_siswa', 'nis', 'tanggal', 'jam_absen', 'status'];

    public function insertData($data)
    {
        return $this->insert($data);
    }
}

?>
