<?php 
namespace App\Models;
use CodeIgniter\Model;

class M_softdelete extends Model
{
    
    protected $table = 'user'; // Tambahkan ini agar CodeIgniter tahu tabel yang digunakan
    protected $primaryKey = 'id_user'; // Pastikan ini sesuai dengan primary key di tabel

    protected $allowedFields = ['kondisi']; // Tambahkan kolom yang boleh di-update
    public function softDelete($id)
    {
        $user = $this->find($id);
        if ($user) {
            return $this->update($id, ['kondisi' => 1]);
        }
        return false; 
    }

    public function restore($id)
    {
        return $this->update($id, ['kondisi' => 0]);
    }

    public function getDeletedUser()
    {   
        return $this->db->table('user')
        ->select('user.*, user.kondisi') 
        ->where('user.kondisi', 1)
        ->get()
        ->getResult();  
    }
}

?>
