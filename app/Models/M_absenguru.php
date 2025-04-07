<?php
namespace App\Models;
use CodeIgniter\Model;

class M_absenguru extends Model
{

protected $table = 'absensi_guru'; // Sesuaikan dengan tabel utama model ini
protected $primaryKey = 'id_absenguru'; // Sesuaikan dengan primary key tabel
protected $allowedFields = ['id_guru', 'tanggal', 'jam_absen', 'status']; // Sesuaikan dengan kolom yang bisa diinput

}
?>