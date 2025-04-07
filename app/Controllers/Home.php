<?php

namespace App\Controllers;
// require_once APPPATH . '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options; 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use TCPDF;
use App\Models\M_belajar;
use App\Models\M_softdelete;
use App\Models\M_log;
use App\Models\M_absen;
use App\Models\M_absensiswa;
use App\Models\M_absenguru;
use App\Models\M_laporan;
use App\Models\M_user;
use App\Models\M_siswa;
use App\Models\M_guru;
use App\Models\M_code;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;


class Home extends BaseController
{
	public function index()
	{
		return view('absensi');
    }
    public function login()
    {
        echo view('login_gudang.php');
    }
    public function absensiguru()
    {

        if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4) {
            helper('log');
            log_activity(session()->get('id'), 'User mengakses tabel absensi guru');
        $nesya= new M_absen;
        $where=('id_absenguru');
        $sc['resdi'] = $nesya->absenguru();
        if (session()->get('level')==2) {
            $where=array('guru.id_user' => session()->get('id'));
            $hee['prof']=$nesya->jwhere1('user', 'guru', 'user.id_user=guru.id_user',$where);
        }else if (session()->get('level')==1) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$nesya->getWhere('user', $where);
        }else if (session()->get('level')==3) {
            $where=array('siswa.id_user' => session()->get('id'));
            $hee['prof']=$nesya->jwhere1('user', 'siswa', 'user.id_user=siswa.id_user',$where);
        }else if (session()->get('level')==4) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$nesya->getWhere('user', $where);    
        }
        $nesya->log_activity(session()->get('id'), "User Akses Absensi Guru");
        echo view ('header', $hee);         // echo view ('dashboard1.php');
        echo view ('absenguru.php',$sc);
        echo view ('footer.php');
        }else if (session()->get('level')>0){
            return redirect()->to('home/error');
        }else{
            return redirect()->to('home/login');
        }
    }
    public function hapus_absensiguru($id){

        $maria= new M_belajar;
        $stmana= array('id_absenguru' => $id);
        $wendy['resdi'] = $maria->hapus('absensi_guru', $stmana);
        return redirect()->to('home/absensiguru');
    }
     public function edit_absensiguru($id){
        $maria= new M_absen;
        
        $were = ['id_guru' => $id];
    	$wendy['guru2'] = $maria->getGuruByAbsensi($id_guru);
    	$weve = ['id_kelas' => $id];
    	$wendy['kelas2'] = $maria->getWhere('kelas', $weve);
    	$wece = ['id_absenguru' => $id];
    	$wendy['absenguru'] = $maria->getWhere('absensi_guru', $wece);
        
        echo view('absenguru1', $wendy);
    }
    public function edit_absensisiswa($id){
        $maria= new M_absen;
        
        $were = ['id_siswa' => $id];
        $wendy['guru2'] = $maria->getSiswaByAbsensi($id_guru);
        $weve = ['id_kelas' => $id];
        $wendy['kelas2'] = $maria->getWhere('kelas', $weve);
        $wece = ['id_absensiswa' => $id];
        $wendy['absenguru'] = $maria->getWhere('absensi_siswa', $wece);
        
        echo view('absensiswa', $wendy);
    }
    public function simpan_absensisiswa()
    {
        
         $c=$this->request->getpost('jam');
         $d=$this->request->getpost('status');
         $id=$this->request->getpost('id');
        
           $maria= new M_absen;

           $stmana= array('id_absensiswa' => $id);
           $data = array (
            
            "jam_absen"=>$c,
            "status"=>$d
           );

           $maria->edit('absensi_siswa',$data,$stmana);

           helper('log');
           log_activity(session()->get('id'), 'User mengubah data absensi siswa: ' . $id);
           return redirect()->to('home/absensisiswa');
   }

    public function simpan_absensiguru()
    {
        
         $c=$this->request->getpost('jam');
         $d=$this->request->getpost('status');
         $id=$this->request->getpost('id');
        
           $maria= new M_belajar;

           $stmana= array('id_absenguru' => $id);
           $data = array (
            
            "jam_absen"=>$c,
            "status"=>$d
           );

           $maria->edit('absensi_guru',$data,$stmana);

           helper('log');
           log_activity(session()->get('id'), 'User mengubah data absensi siswa: ' . $id);
           return redirect()->to('home/absensiguru');
   }

    public function laporanm()
    {
        if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4){ 
            $joyce= new M_absen;
            $where=('id_absenguru');
            $wendy['absenguru']=$joyce->absenguru();
            $where=('id_absensiswa');
            $wendy['absensiswa']=$joyce->absensiswa();
            $where=('id_jadwal');
            $wendy['jadwal']=$joyce->join3();
            $where=('id_kelas');
            $wendy['kelas']=$joyce->tampil('kelas',$where);
            $where=('id_guru');
		    $wendy['guru']=$joyce->tampil('guru',$where);
           
            if (session()->get('level')==2) {
                $where=array('guru.id_user' => session()->get('id'));
                $hee['prof']=$joyce->jwhere1('user', 'guru', 'user.id_user=guru.id_user',$where);
            }else if (session()->get('level')==1) {
                $where=array('id_user' => session()->get('id'));
                $hee['prof']=$joyce->getWhere('user', $where);
            }else if (session()->get('level')==3) {
                $where=array('siswa.id_user' => session()->get('id'));
                $hee['prof']=$joyce->jwhere1('user', 'siswa', 'user.id_user=siswa.id_user',$where);
            }else if (session()->get('level')==4) {
                $where=array('id_user' => session()->get('id'));
                $hee['prof']=$joyce->getWhere('user', $where);    
            }
            $joyce->log_activity(session()->get('id'), "User Akses laporan");

        // echo view ('header.php');
        // echo view('menu');
        echo view ('laporanm', $wendy);
        // echo view ('footer');
        }else if(session()->get('level')>0){
            return redirect()->to('home/error');
        }else{
            return redirect()->to('home/login');
        }
    }

 
    public function absensiswa()
    {
         if (session()->get('level')==1 || session()->get('level')==3 || session()->get('level')==4) {
        $nesya= new M_belajar;
        $where=('id_absensiswa');
        $sc['resdi'] = $nesya->tampil('absensi_siswa',$where);
        echo view ('header.php');
        // echo view ('dashboard.php');
        echo view ('absensiswa.php',$sc);
        echo view ('footer.php');
        }else if (session()->get('level')>0){
            return redirect()->to('home/error');
        }else{
            return redirect()->to('home/login');
        }
    }
 
    public function jadwal()
    {
       if (session()->get('level')=='1'){ 
            $nesya= new M_belajar;
            $where = ('id_absensiswa');
            $sc['resdi']=$nesya->absensiswa();

        echo view ('header.php');
        // echo view ('dashboard.php');
        echo view ('jadwal.php',$sc);
        echo view ('footer.php');
        }else if (session()->get('level')>0){
            return redirect()->to('home/error');
        }else{
            return redirect()->to('home/login');
        }
    } 

    public function tbluser()
{
    if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 4) {
        $joyce= new M_absen;
        $anna= new M_softdelete;
        $where=('id_user');
        $sc = [
            'title' => 'Data User',
            'resdi' => $joyce->tampiluser('user', $where),
            'deleted_user' => $anna->getDeletedUser(),
            'showWelcome' => false 
        ];
        if (session()->get('level')==2) {
            $where=array('guru.id_user' => session()->get('id'));
            $hee['prof']=$joyce->jwhere1('user', 'guru', 'user.id_user=guru.id_user',$where);
        }else if (session()->get('level')==1) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$joyce->getWhere('user', $where);
        }else if (session()->get('level')==3) {
            $where=array('siswa.id_user' => session()->get('id'));
            $hee['prof']=$joyce->jwhere1('user', 'siswa', 'user.id_user=siswa.id_user',$where);
        }else if (session()->get('level')==4) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$joyce->getWhere('user', $where);    
        }
        $joyce->log_activity(session()->get('id'), "User Akses User");
        echo view ('header', $hee);
        echo view('tbluser.php', $sc);
        echo view('footer.php');
    } else if (session()->get('level') > 0) {
        return redirect()->to('home/error');
    } else {
        return redirect()->to('home/login');
    }
}

public function hapus_user($id){
    $maria= new M_belajar;
    $stmana= array('id_user' => $id);
    $wendy['resdi'] = $maria->hapus('user', $stmana);
    return redirect()->to('home/tbluser');
}
public function edituser ($id)
{

    $joyce= new M_absen;
    $wece= array('id_user' =>$id);
    $data = array(
        
        "password"=>('1111'),

    );
    $joyce->edit('user',$data,$wece);
    return redirect()->to('home/tbluser');
}
public function simpan_user()
{
     $a=$this->request->getpost('username');
     $b=$this->request->getpost('password');
     $c=$this->request->getpost('level');
       $id=$this->request->getpost('id');
        $maria= new M_belajar;
       $stmana= array('id_user' => $id);
       $data = array (
        "username"=>$a,
        "password"=>$b,
        "level"=>$c  
       );

       $maria->edit('user',$data,$stmana);
       return redirect()->to('home/tbluser');
     
}
public function inputuser()
{
        $maria= new M_belajar;
       $data = array (
        'username'=> $this->request->getPost('username'),
        'password'=> $this->request->getPost('password'),
        'level'=> $this->request->getPost('level'),
       );

       $maria->simpan_user($data);
       return redirect()->to('/home/tbluser');
     
}
public function forminputuser()
{
if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4) {
$nesya= new M_belajar;
    $where = ('id_user');
   $sc['resdi']=$nesya->tampil('user',$where);
    echo view ('header.php');
    // echo view ('menu.php');
    echo view ('inputuser.php',$sc);
    echo view ('footer.php');
    }else if (session()->get('level')>0){
        return redirect()->to('home/error');
    }else{
        return redirect()->to('home/login');
    }
}
public function deleteB($id)
    {
        $joyce = new M_softdelete();
        $result = $joyce->softDelete($id);

        if ($result) {
        $this->logActivity("Menghapus data user dengan ID: $id (soft delete)");
    
            return redirect()->to('home/user')->with('success', 'User berhasil dihapus (soft delete)');
        } else {
            return redirect()->to('home/user')->with('error', 'User tidak ditemukan');
        }
    }

public function restoreB($id)
{
    $joyce = new M_softdelete();
    $result = $joyce->restore($id);

    if ($result) {
        $this->logActivity("Mengembalikan User dengan ID: $id (soft delete)");

        return redirect()->to('home/user')->with('success', 'User berhasil direstore');
    } else {
        return redirect()->to('home/user')->with('error', 'User tidak ditemukan');
    }
}
    public function tblguru()
    {
        if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4) {
        $nesya= new M_absen;
        $where=('id_guru');
        $sc['resdi'] = $nesya->join('guru', 'user', 'guru.id_user=user.id_user');
        if (session()->get('level')==2) {
            $where=array('guru.id_user' => session()->get('id'));
            $hee['prof']=$nesya->jwhere1('user', 'guru', 'user.id_user=guru.id_user',$where);
        }else if (session()->get('level')==1) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$nesya->getWhere('user', $where);
        }else if (session()->get('level')==3) {
            $where=array('siswa.id_user' => session()->get('id'));
            $hee['prof']=$nesya->jwhere1('user', 'siswa', 'user.id_user=siswa.id_user',$where);
        }else if (session()->get('level')==4) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$nesya->getWhere('user', $where);    
        }
        $nesya->log_activity(session()->get('id'), "User Akses Tabel Guru");

        echo view ('header', $hee);         // echo view ('dashboard1.php');
        echo view ('tblguru.php',$sc);
        echo view ('footer.php');
        }else if (session()->get('level')>0){
            return redirect()->to('home/error');
        }else{
            return redirect()->to('home/login');
        }
    }
    public function hapus_guru($id){
        $maria= new M_belajar;
        $stmana= array('id_guru' => $id);
        $wendy['resdi'] = $maria->hapus('guru', $stmana);
        return redirect()->to('home/tblguru');
    }
     public function edit_guru($id){
        $maria= new M_belajar;
        $stmana= array('id_guru' => $id);
        $steven['resdi'] = $maria->getWhere('guru', $stmana);
        // echo view('header');
        // echo view('menu');
        echo view('guru', $steven);
        // echo view('footer');
    }
    public function simpan_guru ()
	{
		$a=$this->request->getPost('nama_guru');
		$b=$this->request->getPost('nik');
		$c=$this->request->getPost('id');
		$d=$this->request->getPost('foto');
		$e=$this->request->getPost('user');
        date_default_timezone_set('Asia/jakarta');
        $current_time = date('Y-m-d H:i:s');
        $id = session()->get('id');

		$joyce= new M_belajar;
		$wece= array('id_guru' =>$c);
		$data = array(
			"nama_guru"=>$a,
			"nik"=>$b,
            "update_by"=>$id,
            "updated_at"=>$current_time,		
		);
		$joyce->edit('guru',$data,$wece);
		return redirect()->to('home/tblguru');

	}
    public function detailguru($id)
{
    $model = new M_absen();

    if (session()->get('level') == 1 || session()->get('level')==4) {
        $where = ['id_guru' => $id];
        $guru = $model->getWhere('guru', $where);

        if ($guru) {
            // Memuat nama pengguna untuk created_by, updated_by, dan deleted_by
            $guru->created_by_name = $model->getUsernameById($guru->created_by);
            $guru->updated_by_name = $model->getUsernameById($guru->update_by);
            $guru->deleted_by_name = $model->getUsernameById($guru->deleted_by);
        }

        $data['child'] = $guru;

        echo view('header');
        echo view('course_info', $data);
        echo view('footer');
    } else {
        return redirect()->to('/home/login');
    }
}
public function detailsiswa($id)
{
    $model = new M_absen();

    if (session()->get('level') == 1 || session()->get('level')==4) {
        $where = ['id_siswa' => $id];
        $siswa = $model->getWhere('siswa', $where);

        if ($siswa) {
            // Memuat nama pengguna untuk created_by, updated_by, dan deleted_by
            $siswa->created_by_name = $model->getUsernameById($siswa->created_by);
            $siswa->updated_by_name = $model->getUsernameById($siswa->update_by);
            $siswa->deleted_by_name = $model->getUsernameById($siswa->deleted_by);
        }

        $data['child'] = $siswa;

        echo view('header');
        echo view('siswa_info', $data);
        echo view('footer');
    } else {
        return redirect()->to('/home/login');
    }
}

    public function forminputguru ()
	{
		$joyce= new M_absen;
		$where=('id_guru');
		$wendy['guru']=$joyce->tampil('guru',$where);
		$where=('id_user');
		$wendy['user']=$joyce->tampil('user',$where);
		$wendy['iyah']=$joyce->join('guru','user','guru.id_user=user.id_user');

		echo view('inputguru', $wendy);

	}
    public function saveiguru ()
    {
        $a=$this->request->getPost('file');
        $b=$this->request->getPost('nama');
        $c=$this->request->getPost('nik');
        $d=$this->request->getPost('username');
        $e=$this->request->getPost('password');
        $f=$this->request->getPost('level');
        $g=$this->request->getPost('status');
        $h=$this->request->getPost('alamat');
        $i=$this->request->getPost('nomor');
        $j=$this->request->getPost('user');
        
        $joyce= new M_belajar;
        $data = array(
            "foto"=>$a,
            "username"=>$d,
            "password"=>$e,
            "level"=>$f,
            "status"=>$g,
            "nama_user"=>$j,
            "created_by"=> session()->get('id')
        );
        $file = $_FILES["file"];
        $validExtensions = ["jpg", "png", "jpeg"];
        $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
        $timestamp = time(); 
        $newFileName = $timestamp . "_" . $file["name"]; 
        move_uploaded_file($file["tmp_name"], "img/" . $newFileName);
        $data['foto'] = $newFileName;

        $joyce->input('user',$data);
        $id_user = $joyce->insertID(); // Mengambil ID user yang baru dimasukkan
        $where=array(
            "username"=>$c,
        );
        $wendy=$joyce->getWhere('user',$where);
        $data2=array(
            "id_user"=>$id_user,
            "nama_guru"=>$b,
            "nik"=>$c,
            "alamat"=>$h,
            "no_hp"=>$i,

        );
        $joyce->input('guru',$data2);   
        return redirect()->to('home/tblguru');

    }
    public function aksi_login ()
            {
            $recaptcha_secret = "6LcSQ-kqAAAAAAIfUiu-RnQLT-Km7EjNWh9XcJIp"; // Replace with your actual secret key
        $recaptcha_response = $_POST['g-recaptcha-response'];
    
        // Verify with Google
        $verify_url = "https://www.google.com/recaptcha/api/siteverify";
        $response = file_get_contents($verify_url . "?secret=" . $recaptcha_secret . "&response=" . $recaptcha_response);
        $response_keys = json_decode($response, true);
    
        if (!$response_keys["success"]) {
            echo "reCAPTCHA verification failed. Please try again.";
            exit();
        }
        $a=$this->request->getPost('user');
        $b=$this->request->getPost('pass');

        $love = new M_absen;
        $data = array(
            "username"=>$a,
            "password"=>$b,
        );

        $cek = $love->getWhere('user',$data);

        if ($cek) { // Jika user ditemukan
session()->set([
    'id' => $cek->id_user,
    'u' => $cek->username,
    'level' => $cek->level
]);
        return redirect()->to(base_url('home/dashboard'));
    }
}

//     public function aksi_login()
// {
//     helper('log'); // Load helper log_activity

//     $recaptcha_secret = "6LcSQ-kqAAAAAAIfUiu-RnQLT-Km7EjNWh9XcJIp"; // Replace with your actual secret key
//     $recaptcha_response = $_POST['g-recaptcha-response'];

//     // Verify with Google
//     $verify_url = "https://www.google.com/recaptcha/api/siteverify";
//     $response = file_get_contents($verify_url . "?secret=" . $recaptcha_secret . "&response=" . $recaptcha_response);
//     $response_keys = json_decode($response, true);

//     if (!$response_keys["success"]) {
//         echo "reCAPTCHA verification failed. Please try again.";
//         exit();
//     }

//     $a = $this->request->getPost('user'); // Fixed method name (getPost)
//     $b = $this->request->getPost('pass');

//     $maria = new M_belajar;
//     $sc = array(
//         'username' => $a,
//         'password' => $b,
//     );

//     $cek = $maria->getWhere('user', $sc);
//     if ($cek != null) {
//         session()->set('id', $cek->id_user);
//         session()->set('u', $cek->username);
//         session()->set('level', $cek->level);
//         log_activity($cek->id_user, 'User berhasil login');
//         return redirect()->to('home/dashboard');
//     } else {
//         return redirect()->to('home/login');
//     }
// }

 
    public function tblsiswa()
    {
        if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4) {
        $nesya= new M_absen;
        $where=('id_siswa');
        $sc['resdi']=$nesya->join2('siswa','user','kelas', 
        'siswa.id_user=user.id_user', 'siswa.id_kelas=kelas.id_kelas');
        if (session()->get('level')==2) {
            $where=array('guru.id_user' => session()->get('id'));
            $hee['prof']=$nesya->jwhere1('user', 'guru', 'user.id_user=guru.id_user',$where);
        }else if (session()->get('level')==1) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$nesya->getWhere('user', $where);
        }else if (session()->get('level')==3) {
            $where=array('siswa.id_user' => session()->get('id'));
            $hee['prof']=$nesya->jwhere1('user', 'siswa', 'user.id_user=siswa.id_user',$where);
        }else if (session()->get('level')==4) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$nesya->getWhere('user', $where);    
        }
        $nesya->log_activity(session()->get('id'), "User Akses Siswa");

        echo view ('header', $hee);
         // echo view ('dashboard1.php');
        echo view ('tblsiswa.php',$sc);
        echo view ('footer.php');
        }else if (session()->get('level')>0){
            return redirect()->to('home/error');
        }else{
            return redirect()->to('home/login');
        }
    }

    public function hapus_siswa($id){
        $maria= new M_belajar;
        $stmana= array('id_siswa' => $id);
        $wendy['resdi'] = $maria->hapus('siswa', $stmana);
        return redirect()->to('home/tblsiswa');
    }
     public function edit_siswa($id){
        $maria= new M_belajar;
        $stmana= array('id_siswa' => $id);
        $steven['resdi'] = $maria->getWhere('siswa', $stmana);
        $where=('id_siswa');
        $stmana= array('id_user' =>$id);
        $steven['user']=$maria->getWhere('user',$stmana);
        $where=('id_user');
        $where=('id_kelas');
		$steven['kelas']=$maria->tampil('kelas',$where);
        // echo view('header');
        // echo view('menu');
        echo view('siswa', $steven);
        // echo view('footer');
    }
    public function simpan_siswa()
    {
        $a=$this->request->getPost('nama');
		$b=$this->request->getPost('nis');
		$c=$this->request->getPost('id');
		$d=$this->request->getPost('namakelas');
        date_default_timezone_set('Asia/jakarta');
        $current_time = date('Y-m-d H:i:s');
        $id = session()->get('id');

		$joyce= new M_absen;
		$wece= array('id_siswa' =>$c);
		$data = array(
			"nama_siswa"=>$a,
			"nis"=>$b,
			"id_kelas"=>$d,
            "update_by"=>$id,
            "updated_at"=>$current_time,
		);
		$joyce->edit('siswa',$data,$wece);
		return redirect()->to('home/tblsiswa');

         
   }
   public function inputsiswa()
   {
    $a = $this->request->getPost('file');
    $b = $this->request->getPost('nama');
    $c = $this->request->getPost('nis');
    $d = $this->request->getPost('username');
    $e = $this->request->getPost('password');
    $f = $this->request->getPost('level');
    $g = $this->request->getPost('status');
    $h = $this->request->getPost('alamat');
    $i = $this->request->getPost('nomor');
    $j = $this->request->getPost('kelas');
    $k = $this->request->getPost('namauser');

    if (empty($j)) {
        echo "ID Kelas tidak boleh kosong!";
        exit;
    }

    $joyce = new M_absen;
    $data = [
        "foto" => $a,
        "username" => $d,
        "password" => $e,
        "level" => $f,
        "status" => $g,
        "nama_user" => $k,
        "created_by"=> session()->get('id')
    ];
    $file = $_FILES["file"];
    $validExtensions = ["jpg", "png", "jpeg"];
    $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
    $timestamp = time(); 
    $newFileName = $timestamp . "_" . $file["name"]; 
    move_uploaded_file($file["tmp_name"], "img/" . $newFileName);
    $data['foto'] = $newFileName;
    $joyce->input('user', $data);
    $id_user = $joyce->insertID();

    $data2 = [
        "id_user" => $id_user,
        "nama_siswa" => $b,
        "nis" => $c,
        "alamat" => $h,
        "no_hp" => $i,
        "id_kelas" => $j,
    ];

    $joyce->input('siswa', $data2);
    return redirect()->to('home/tblsiswa');
         
   }
   public function forminputsiswa()
   {
    if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4) {
   $nesya= new M_absen;
       $where=('id_siswa');
		$wendy['anjas']=$joyce->tampil('siswa',$where);
        echo view ('header.php');
        // echo view ('menu.php');
        echo view ('inputsiswa.php',$sc);
        echo view ('footer.php');
        }else if (session()->get('level')>0){
            return redirect()->to('home/error');
        }else{
            return redirect()->to('home/login');
        }
    }

    public function tblabsensisiswa()
    {
        if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4) {
        $nesya= new M_absen;
        $where=('id_absensiswa');
        $sc['resdi'] = $nesya->absensiswa();
        if (session()->get('level')==2) {
            $where=array('guru.id_user' => session()->get('id'));
            $hee['prof']=$nesya->jwhere1('user', 'guru', 'user.id_user=guru.id_user',$where);
        }else if (session()->get('level')==1) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$nesya->getWhere('user', $where);
        }else if (session()->get('level')==3) {
            $where=array('siswa.id_user' => session()->get('id'));
            $hee['prof']=$nesya->jwhere1('user', 'siswa', 'user.id_user=siswa.id_user',$where);
        }else if (session()->get('level')==4) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$nesya->getWhere('user', $where);    
        }
        $nesya->log_activity(session()->get('id'), "User Akses Absensi Siswa");
        echo view ('header', $hee);         // echo view ('dashboard1.php');
        echo view ('tblabsensisiswa.php',$sc);
        echo view ('footer.php');
        }else if (session()->get('level')>0){
            return redirect()->to('home/error');
        }else{
            return redirect()->to('home/login');
        }
    }

    public function tblkelas()
    {
        if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4) {
        $nesya= new M_absen;
        $where=('id_kelas');
        $sc['resdi'] = $nesya->join('kelas','guru', 'kelas.id_guru=guru.id_guru', $where);
        
        if (session()->get('level')==2) {
            $where=array('guru.id_user' => session()->get('id'));
            $hee['prof']=$nesya->jwhere1('user', 'guru', 'user.id_user=guru.id_user',$where);
        }else if (session()->get('level')==1) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$nesya->getWhere('user', $where);
        }else if (session()->get('level')==3) {
            $where=array('siswa.id_user' => session()->get('id'));
            $hee['prof']=$nesya->jwhere1('user', 'siswa', 'user.id_user=siswa.id_user',$where);
        }else if (session()->get('level')==4) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$nesya->getWhere('user', $where);    
        }
        $nesya->log_activity(session()->get('id'), "User Akses kelas");

        echo view ('header', $hee);         // echo view ('dashboard1.php');
        echo view ('tblkelas.php',$sc);
        echo view ('footer.php');
        }else if (session()->get('level')>0){
            return redirect()->to('home/error');
        }else{
            return redirect()->to('home/login');
        }
    }
    public function hapus_kelas($id){
        $maria= new M_belajar;
        $stmana= array('id_kelas' => $id);
        $wendy['resdi'] = $maria->hapus('kelas', $stmana);
        return redirect()->to('home/tblkelas');
    }
     public function edit_kelas($id){
        $maria= new M_belajar;
        $stmana= array('id_kelas' => $id);
        $steven['resdi'] = $maria->getWhere('kelas', $stmana);
        // echo view('header');
        // echo view('menu');
        echo view('kelas', $steven);
        // echo view('footer');
    }
    public function simpan_kelas()
    {
         $a=$this->request->getpost('id_kelas');
         $b=$this->request->getpost('nama_kelas');
           $id=$this->request->getpost('id');
            $maria= new M_belajar;
           $stmana= array('id_kelas' => $id);
           $data = array (
            "id_kelas"=>$a,
            "nama_kelas"=>$b
           );

           $maria->edit('kelas',$data,$stmana);
           return redirect()->to('home/tblkelas');
         
   }
   public function inputkelas()
   {
            $maria= new M_belajar;
           $data = array (
            'id_kelas'=> $this->request->getPost('id_kelas'),
            'nama_kelas'=> $this->request->getPost('nama_kelas'),
            'id_guru' => $this->request->getPost('walkel'),

           );

           $maria->simpan_kelas($data);
           return redirect()->to('/home/tblkelas');
         
   }
   public function forminputkelas()
   {
    if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4) {
   $nesya= new M_belajar;
        $where = ('id_kelas');
       $sc['resdi']=$nesya->tampil('kelas',$where);
       $where=('id_guru');
		$sc['wali']=$nesya->tampil('guru',$where);
        // echo view ('header.php');
        // echo view ('menu.php');
        echo view ('inputkelas.php',$sc);
        // echo view ('footer.php');
        }else if (session()->get('level')>0){
            return redirect()->to('home/error');
        }else{
            return redirect()->to('home/login');
        }
    }
   
//     public function tblmapel()
//     {
//         if (session()->get('level')==1 || session()->get('level')==2) {
//         $nesya= new M_belajar;
//         $where=('id_mapel');
//         $sc['resdi'] = $nesya->tampil('mapel',$where);
//         echo view ('header.php');
//          // echo view ('dashboard1.php');
//         echo view ('tblmapel.php',$sc);
//         echo view ('footer.php');
//         }else if (session()->get('level')>0){
//             return redirect()->to('home/error');
//         }else{
//             return redirect()->to('home/login');
//         }
//     }
//     public function hapus_mapel($id){
//         $maria= new M_belajar;
//         $stmana= array('id_mapel' => $id);
//         $wendy['resdi'] = $maria->hapus('mapel', $stmana);
//         return redirect()->to('home/tblmapel');
//     }
//      public function edit_mapel($id){
//         $maria= new M_belajar;
//         $stmana= array('id_mapel' => $id);
//         $steven['resdi'] = $maria->getWhere('mapel', $stmana);
//         echo view('header');
//         // echo view('menu');
//         echo view('mapel', $steven);
//         echo view('footer');
//     }
//     public function simpan_mapel()
//     {
//          $a=$this->request->getpost('nama_mapel');
//            $id=$this->request->getpost('id');
//             $maria= new M_belajar;
//            $stmana= array('id_mapel' => $id);
//            $data = array (
//             "nama_mapel"=>$a  
//            );

//            $maria->edit('mapel',$data,$stmana);
//            return redirect()->to('home/tblmapel');
         
//    }
//    public function inputmapel()
//    {
//             $maria= new M_belajar;
//            $data = array (
//             'nama_mapel'=> $this->request->getPost('nama_mapel'),
//            );

//            $maria->simpan_mapel($data);
//            return redirect()->to('/home/tblmapel');
         
//    }
//    public function forminputmapel()
//    {
//     if (session()->get('level')==1 || session()->get('level')==2) {
//    $nesya= new M_belajar;
//         $where = ('id_mapel');
//        $sc['resdi']=$nesya->tampil('mapel',$where);
//         echo view ('header.php');
//         // echo view ('menu.php');
//         echo view ('inputmapel.php',$sc);
//         echo view ('footer.php');
//         }else if (session()->get('level')>0){
//             return redirect()->to('home/error');
//         }else{
//             return redirect()->to('home/login');
//         }
//     }
    
//     public function tbljadwal()
//     {
//         if (session()->get('level')==1 || session()->get('level')==2) {
//         $nesya= new M_belajar;
//         $where=('id_jadwal');
//         $sc['resdi'] = $nesya->absensiswa();
//         echo view ('header.php');
//          // echo view ('dashboard1.php');
//         echo view ('tabeljadwal.php',$sc);
//         echo view ('footer.php');
//         }else if (session()->get('level')>0){
//             return redirect()->to('home/error');
//         }else{
//             return redirect()->to('home/login');
//         }
//     }
//     public function hapus_jadwal($id){
//         $maria= new M_belajar;
//         $stmana= array('id_jadwal' => $id);
//         $wendy['resdi'] = $maria->hapus('jadwal', $stmana);
//         return redirect()->to('home/tbljadwal');
//     }
//      public function edit_jadwal($id){
//         $maria= new M_belajar;
//         $stmana= array('id_jadwal' => $id);
//         $steven['resdi'] = $maria->getWhere('jadwal', $stmana);
//         echo view('header');
//         // echo view('menu');
//         echo view('jadwal', $steven);
//         echo view('footer');
//     }
//     public function simpan_jadwal()
//     {
//          $a=$this->request->getpost('id_kelas');
//          $b=$this->request->getpost('id_mapel');
//          $c=$this->request->getpost('id_guru');
//          $d=$this->request->getpost('hari');
//          $e=$this->request->getpost('jam_mulai');
//          $f=$this->request->getpost('jam_selesai');
//            $id=$this->request->getpost('id');
//             $maria= new M_belajar;
//            $stmana= array('id_jadwal' => $id);
//            $data = array (
//             "id_kelas"=>$a,
//             "id_mapel"=>$b,
//             "id_guru"=>$c,
//             "hari"=>$d,
//             "jam_mulai"=>$e,
//             "jam_selesai"=>$f   
//            );

//            $maria->edit('jadwal',$data,$stmana);
//            return redirect()->to('home/tbljadwal');
         
//    }
//    public function inputjadwal()
//    {
//             $maria= new M_belajar;
//            $data = array (
//             'id_kelas'=> $this->request->getPost('id_kelas'),
//             'id_mapel'=> $this->request->getPost('id_mapel'),
//             'id_guru'=> $this->request->getPost('id_guru'),
//             'hari'=> $this->request->getPost('hari'),
//             'jam_mulai'=> $this->request->getPost('jam_mulai'),
//             'jam_selesai'=> $this->request->getPost('jam_selesai'),
//            );

//            $maria->simpan_jadwal($data);
//            return redirect()->to('/home/tbljadwal');
         
//    }
//    public function forminputjadwal()
//    {
//     if (session()->get('level')==1 || session()->get('level')==2) {
//    $nesya= new M_belajar;
//         $where = ('id_jadwal');
//        $sc['resdi']=$nesya->tampil('jadwal',$where);
//         echo view ('header.php');
//         // echo view ('menu.php');
//         echo view ('inputjadwal.php',$sc);
//         echo view ('footer.php');
//         }else if (session()->get('level')>0){
//             return redirect()->to('home/error');
//         }else{
//             return redirect()->to('home/login');
//         }
//     }
    public function logout()
    {
        helper('log');
        log_activity(session()->get('id'), 'User logout');
        session()->destroy();
        return redirect()->to('home/login');
    }
//     public function dashboard()
//          {
//             $joyce = new M_belajar;
//             $where=array('id_user' => session()->get('id'));
// 			$wendy['anjas']=$joyce->getwhere('user',$where);
//       if (session()->has('id') && session()->get('id') > 0) {
//         if (session()->get('level')==2) {
//             $where=array('guru.id_user' => session()->get('id'));
//             $hee['prof']=$joyce->jwhere1('user', 'guru', 'user.id_user=guru.id_user',$where);
//         }else if (session()->get('level')==1) {
//             $where=array('id_user' => session()->get('id'));
//             $hee['prof']=$joyce->getWhere('user', $where);
//         }else if (session()->get('level')==3) {
//             $where=array('siswa.id_user' => session()->get('id'));
//             $hee['prof']=$joyce->jwhere1('user', 'siswa', 'user.id_user=siswa.id_user',$where);
//         }
//         echo view ('header', $hee);
//         echo view('dashboard',$wendy);
//         echo view ('footer');
// }else{
//     return redirect()->to('home');
// }    
// }

   public function dashboard()
{

        if (session()->get('id')>0) {
            $joyce= new M_absen;
            $where=array('id_user' => session()->get('id'));
            $wendy['anjas']=$joyce->getwhere('user',$where);

            if (session()->get('level')==2) {
                $where=array('guru.id_user' => session()->get('id'));
                $hee['prof']=$joyce->jwhere1('user', 'guru', 'user.id_user=guru.id_user',$where);
            }else if (session()->get('level')==1) {
                $where=array('id_user' => session()->get('id'));
                $hee['prof']=$joyce->getWhere('user', $where);
            }else if (session()->get('level')==3) {
                $where=array('siswa.id_user' => session()->get('id'));
                $hee['prof']=$joyce->jwhere1('user', 'siswa', 'user.id_user=siswa.id_user',$where);
            }else if (session()->get('level')==4) {
                $where=array('id_user' => session()->get('id'));
                $hee['prof']=$joyce->getWhere('user', $where);    
            }
            $joyce->log_activity(session()->get('id'), "User Akses Dashboard");
            echo view('header',$hee);
            echo view('dashboard',$wendy);
            echo view('footer');

        }else{
            return redirect()->to('absen/login');
        }
    }

public function excellapor_ag()
    {
        $maria = new M_belajar;
        $a=$this->request->getPost('awal');
        $b=$this->request->getPost('akhir');
        $wendy['resdi']=$maria->filter('absensi_guru', 'guru', 'absensi_guru.id_guru=guru.id_guru', 'tanggal_masuk >=','tanggal_masuk <=', "$a", "$b");
        echo view ('excellapor_ag',$wendy);
    }
	public function laporansiswa()
	{
		
		$a=$this->request->getPost('awal');
		$b=$this->request->getPost('akhir');
		$c=$this->request->getPost('kelas');
		if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4) {
		$joyce= new M_laporan;
		$wendy['anjas']=$joyce->filtersiswa($c, $a, $b);
		}
        
		$dom = new Dompdf();
		$dom->loadHtml(view('laporansiswa',$wendy));
		$dom->setPaper('A4','landscape');
		$dom->render();
		$dom->stream('siswa.pdf',array('attachment'=>0));
		
	}

    public function excelsiswa()
	{
		$a=$this->request->getPost('awal');
		$b=$this->request->getPost('akhir');
		$c=$this->request->getPost('kelas');
		if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4) {
		$joyce= new M_laporan;
		$wendy['anjas']=$joyce->filtersiswa($c, $a, $b);

    // Load view sebagai template HTML
    // $html = view('excelsiswa', $wendy);

    // Buat objek Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

	$sheet->setCellValue('A1', 'LAPORAN ABSENSI SISWA');
    $sheet->mergeCells('A1:D1'); // Gabungkan sel untuk judul
    $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14); // Atur gaya huruf
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    // 🔹 Tambahkan Header Tabel
    $sheet->setCellValue('A3', 'Nama Siswa');
    $sheet->setCellValue('B3', 'Kelas');
    $sheet->setCellValue('C3', 'Tanggal');
    $sheet->setCellValue('D3', 'Status');

    // Buat header bold
    $sheet->getStyle('A3:E3')->getFont()->setBold(true);
    $sheet->getStyle('A3:E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $row = 5;

    foreach ($wendy['anjas'] as $data) {
        $sheet->setCellValue('A' . $row, $data->nama_siswa);
        $sheet->setCellValue('B' . $row, $data->nama_kelas);
        $sheet->setCellValue('C' . $row, $data->tanggal);
        $sheet->setCellValue('D' . $row, $data->status);
        $row++;
    }
	foreach (range('A', 'E') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    // Atur header untuk file Excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="siswa.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;

}
	}
    public function laporanguru()
	{
		
		$a=$this->request->getPost('awal');
		$b=$this->request->getPost('akhir');
		$c=$this->request->getPost('namaguru');
		if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4) {
		$joyce= new M_laporan;
		$wendy['anjas']=$joyce->filterguru($c, $a, $b);
		}

		$dom = new Dompdf();
		$dom->loadHtml(view('laporanguru',$wendy));
		$dom->setPaper('A4','landscape');
		$dom->render();
		$dom->stream('guru.pdf',array('attachment'=>0));
		
	}

    public function excelguru()
	{
		$a=$this->request->getPost('awal');
		$b=$this->request->getPost('akhir');
		$c=$this->request->getPost('namaguru');

		$joyce = new M_laporan;
		$wendy['anjas']=$joyce->filterguru($c, $a, $b);
		
		// $html = view('excelguru', $wendy);

		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Judul laporan
        $sheet->setCellValue('A1', 'LAPORAN ABSENSI GURU');
        $sheet->mergeCells('A1:E1'); // Gabungkan sel untuk judul
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // 🔹 Tambahkan Header Tabel
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Nama Guru');
        $sheet->setCellValue('C3', 'NIK');
        $sheet->setCellValue('D3', 'Tanggal Absensi');
        $sheet->setCellValue('E3', 'Status');

        // Buat header bold
        $sheet->getStyle('A3:E3')->getFont()->setBold(true);
        $sheet->getStyle('A3:E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $row = 4;
        $no = 1;

        foreach ($wendy['anjas'] as $data) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $data->nama_guru);
            $sheet->setCellValue('C' . $row, $data->nik);
            $sheet->setCellValue('D' . $row, $data->tanggal);
            $sheet->setCellValue('E' . $row, $data->status);
            $row++;
        }

        // Atur ukuran kolom otomatis
        foreach (range('A', 'E') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Atur header untuk file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="guru.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    
	}
    public function generateqr()
    {

        $joyce = new M_absen;
        $where = ('id_siswa');
        $wendy['siswa']=$joyce->tampil('siswa', $where);
        $where = ('id_guru');
        $wendy['guru']=$joyce->tampil('guru', $where);

        if (session()->get('level')==2) {
            $where=array('guru.id_user' => session()->get('id'));
            $hee['prof']=$joyce->jwhere1('user', 'guru', 'user.id_user=guru.id_user',$where);
        }else if (session()->get('level')==1) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$joyce->getWhere('user', $where);
        }else if (session()->get('level')==3) {
            $where=array('siswa.id_user' => session()->get('id'));
            $hee['prof']=$joyce->jwhere1('user', 'siswa', 'user.id_user=siswa.id_user',$where);
        }else if (session()->get('level')==4) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$joyce->getWhere('user', $where);    
        } 

        echo view('header',$hee);
        echo view('menu');
        echo view('generateqr', $wendy);
        echo view('footer');
    }

    public function generatesiswa($nis)
	{
		$joyce = new M_code;
		$user = $joyce->getUserByNIS($nis);
	
		if (!$user) {
			return "User tidak ditemukan.";
		}
	
		// Buat QR Code
		$qrCode = QrCode::create($nis)
			->setEncoding(new Encoding('UTF-8'))
			->setSize(300)
			->setMargin(10);
	
		// Simpan QR Code ke dalam file
		$writer = new PngWriter();
		$result = $writer->write($qrCode);
	
		// Simpan di public/img/
		$fileName = 'qrcode_' . $nis . '.png';
		$filePath = FCPATH . 'img/qrcode_' . $nis . '.png'; // Simpan di public/img/
	
		$result->saveToFile($filePath);
	
		// Update database
		$joyce->updateQrCode($nis, $fileName);
	
		// **Ambil ulang data terbaru setelah update**
		$user = $joyce->getUserByNIS($nis);
	
		echo view('generatesiswa', ['anjas' => $user]);
	}
    public function generateguru($nik)
    {
        $joyce = new M_guru;
        $user = $joyce->getUserByNIK($nik);
    
        if (!$user) {
            return "User tidak ditemukan.";
        }
    
        // Buat QR Code
        $qrCode = QrCode::create($nik)
            ->setEncoding(new Encoding('UTF-8'))
            ->setSize(300)
            ->setMargin(10);
    
        // Simpan QR Code ke dalam file
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
    
        // Simpan di public/img/
        $fileName = 'qrcode_' . $nik . '.png';
        $filePath = FCPATH . 'img/qrcode_' . $nik . '.png'; // Simpan di public/img/
    
        $result->saveToFile($filePath);
    
        // Update database
        $joyce->updateQRguru($nik, $fileName);
    
        // **Ambil ulang data terbaru setelah update**
        $user = $joyce->getUserByNIK($nik);

        echo view('generateguru', ['anjas' => $user]);
    }
    public function profile()
    {
        if (session()->get('level')=='1'){  
            $joyce= new M_absen;
            $wendy['siswa']=$joyce->siswa();
            $wendy['guru']=$joyce->guru();
            $where=('id_user');
            $wendy['id_user']=$joyce->tampil('user', $where);
            if (session()->get('level')==2) {
                $where=array('guru.id_user' => session()->get('id'));
                $hee['prof']=$joyce->jwhere1('user', 'guru', 'user.id_user=guru.id_user',$where);
            }else if (session()->get('level')==1) {
                $where=array('id_user' => session()->get('id'));
                $hee['prof']=$joyce->getWhere('user', $where);
            }else if (session()->get('level')==3) {
                $where=array('siswa.id_user' => session()->get('id'));
                $hee['prof']=$joyce->jwhere1('user', 'siswa', 'user.id_user=siswa.id_user',$where);
            }else if (session()->get('level')==4) {
                $where=array('id_user' => session()->get('id'));
                $hee['prof']=$joyce->getWhere('user', $where);    
            }

            echo view('header',$hee);
            echo view('dashboard1');
            echo view('profile',$wendy);
            echo view('footer');

        }else if(session()->get('level')>0){
            return redirect()->to('home/error');
        }else{
            return redirect()->to('home/login');
        }
    }
    
    public function scansiswa()
{
    $json = $this->request->getJSON();
    log_message('error', 'Data JSON diterima: ' . json_encode($json)); 
    $qrData = $json->qr_data ?? '';

    if (!$qrData) {
        return $this->response->setJSON(['success' => false, 'message' => 'QR Code tidak valid']);
    }

    $joyce = new M_code;
    $nana = new M_absensiswa;

    $tanggal = date('Y-m-d');
    $jam_absen = date('H:i:s');
    log_message('error', 'Tanggal yang digunakan: ' . $tanggal); 

    // Cari ID Siswa berdasarkan NIS dari QR Code
    $siswa = $joyce->table('siswa')
                  ->where('nis', $qrData)
                  ->get()
                  ->getRow(); 

    if (!$siswa) {
        return $this->response->setJSON(['success' => false, 'message' => 'Siswa tidak ditemukan']);
    }

    
    $existing = $nana->table('absensi_siswa')
    ->where('id_siswa', $siswa->id_siswa)
    ->where('tanggal', $tanggal)
    ->get()
    ->getRow();

    if ($existing) {
        return $this->response->setJSON(['success' => false, 'message' => 'Anda sudah absen hari ini!']);
    }


    $data = [
        'id_siswa' => $siswa->id_siswa, // Simpan ID siswa, bukan NIS
        'tanggal' => $tanggal,
        'jam_absen' => $jam_absen,
        'status' => 'Hadir'
    ];

    $nana->table('absensi_siswa')->insert($data);
    return $this->response->setJSON(['success' => true, 'message' => 'Absensi siswa berhasil!']);
}

    public function scanguru()
{
    $json = $this->request->getJSON();
    log_message('error', 'Data JSON diterima: ' . json_encode($json));

    $qrData = $json->qr_data ?? '';

    if (!$qrData) {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'QR Code tidak valid'
        ]);
    }

    $guruModel = new M_guru;
    $absenModel = new M_absenguru;

    $tanggal = date('Y-m-d');
    $jam_absen = date('H:i:s');
    $jam_sekarang = strtotime($jam_absen);

    // Batas waktu absensi
    $jam_masuk_awal     = strtotime('07:00:00');
    $jam_masuk_akhir    = strtotime('16:00:00');
    $jam_terlambat_awal = strtotime('16:00:00');
    $jam_terlambat_akhir= strtotime('18:00:00');
    $jam_pulang_awal    = strtotime('18:00:00');
    $jam_pulang_akhir   = strtotime('21:00:00');

    log_message('error', 'Tanggal yang digunakan: ' . $tanggal);

    // Cari guru berdasarkan NIK dari QR Code
    $guru = $guruModel->table('guru')
                      ->where('nik', $qrData)
                      ->get()
                      ->getRow();

    if (!$guru) {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Guru tidak ditemukan'
        ]);
    }

    // Cek apakah sudah absen masuk hari ini
    $absenHariIni = $absenModel->table('absensi_guru')
                               ->where('id_guru', $guru->id_guru)
                               ->where('tanggal', $tanggal)
                               ->get()
                               ->getRow();

    // Jika sudah absen masuk, lakukan absensi pulang
    if ($absenHariIni) {
        if ($jam_sekarang < $jam_pulang_awal || $jam_sekarang > $jam_pulang_akhir) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Absen pulang hanya boleh antara 18:00 - 21:00'
            ]);
        }

        $updateData = [
            'jam_pulang'  => $jam_absen,
            'updated_at'  => date('Y-m-d H:i:s'),
            'updated_by'  => session()->get('id')
        ];

        $absenModel->table('absensi_guru')
                   ->where('id_absenguru', $absenHariIni->id_absenguru)
                   ->update($updateData);

        helper('log');
        log_activity(session()->get('id'), 'Absensi pulang | ID Guru: ' . $guru->id_guru . ' | Tanggal: ' . $tanggal . ' | Jam: ' . $jam_absen);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Absensi pulang berhasil!'
        ]);
    }

    // Jika belum absen masuk, tentukan status hadir
    if ($jam_sekarang >= $jam_masuk_awal && $jam_sekarang <= $jam_masuk_akhir) {
        $status = 'Hadir';
    } elseif ($jam_sekarang >= $jam_terlambat_awal && $jam_sekarang <= $jam_terlambat_akhir) {
        $status = 'Terlambat';
    } else {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Absen masuk hanya boleh antara 07:00 - 18:00'
        ]);
    }

    // Simpan data absensi masuk
    $data = [
        'id_guru'    => $guru->id_guru,
        'tanggal'    => $tanggal,
        'jam_masuk'  => $jam_absen,
        'status'     => $status,
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => session()->get('id')
    ];

    $absenModel->table('absensi_guru')->insert($data);

    helper('log');
    log_activity(session()->get('id'), 'Absensi masuk | ID Guru: ' . $guru->id_guru . ' | Tanggal: ' . $tanggal . ' | Jam: ' . $jam_absen . ' | Status: ' . $status);

    return $this->response->setJSON([
        'success' => true,
        'message' => 'Absensi masuk berhasil dengan status: ' . $status
    ]);
}

    public function hapusPengguna($id_user)
    {
        if (session()->get('level') == 1 || session()->get('level')==4) {
            $Joyce = new M_belajar();
            
            // Cek apakah id_user ada
            $cek = $Joyce->db->table('user')->where('id_user', $id_user)->get()->getRow();

            if (!$cek) {
                die('ID user tidak ditemukan!');
            }

            // Update delete_status menjadi 1
            $data = ['kondisi' => '1']; // Gunakan string, bukan integer
            $where = ['id_user' => $id_user];

            $Joyce->edit('user', $data, $where);

            return redirect()->to(base_url('home/tbluser'));
        } else {
            return redirect()->to('home');
        }
    } // Ini adalah penutup function hapusPengguna()
    protected function logActivity($activity) 
   {
        $joyce = new M_log;

        $id_user = session()->get('id_user');
        if (!$id_user) return;

        $ip_address = $this->request->getIPAddress();

        $joyce->saveLog($id_user, $activity, $ip_address);
    }
public function user_log_activity()
{
    // Check if the user is logged in
    if (session()->has('id')) {        // Retrieve the logged-in user's ID
        $id_user = session()->get('id');

        // Get log activity for the logged-in user
        $nesya = new M_absen();
        $where = ['log_activity.id_user' => $id_user];
        $data['child'] = $nesya->joinwall(
            'log_activity', 
            'user', 
            'log_activity.id_user = user.id_user', 
            $where, 
            'id_log'
        );

        // Log the user activity (e.g., user accessed log activity)
        $nesya->log_activity(session()->get('id'), "User Akses Absensi Log Activity");

        // Load views with the necessary data
        echo view('header');
        echo view('dashboard1');
        echo view('user_log_activity', $data); // Updated to display user activity logs
        echo view('footer');
    } else {
        // Redirect to login page if the user is not logged in
        return redirect()->to('/home/login');
    }
}

public function log_activity()
{
    $model = new M_absen;
    // Check if the user has the required access level (level 1 or 49)
    if (session()->get('level') == 1 || session()->get('level') == 4) {
        // Get the user ID from the session
        $id_user = session()->get('id_user');

        // Retrieve log activity data for the logged-in user
        $parent['child'] = $model->join(
            'log_activity',
            'user',
            'log_activity.id_user = user.id_user',
            'id_log'
        );
        $model->log_activity(session()->get('id'), "User Akses Absensi Log Activity");
        // Load the header view with the web details
        echo view('header');
        echo view('admin_log_activity', $parent);
        echo view ('footer');
    } else {
        // Redirect to login if the user does not have the required access level
        return redirect()->to('/home/login');
    }
}
public function absensi ()
    {
        $joyce = new M_absen;
        if (session()->get('level')==2) {
            $where=array('guru.id_user' => session()->get('id'));
            $hee['prof']=$joyce->jwhere1('user', 'guru', 'user.id_user=guru.id_user',$where);
        }else if (session()->get('level')==1) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$joyce->getWhere('user', $where);
        }else if (session()->get('level')==3) {
            $where=array('siswa.id_user' => session()->get('id'));
            $hee['prof']=$joyce->jwhere1('user', 'siswa', 'user.id_user=siswa.id_user',$where);
        } 
        echo view('header',$hee);
        echo view('absensi');
    }
    public function absensi2 ()
    {
        $joyce = new M_absen;
        if (session()->get('level')==2) {
            $where=array('guru.id_user' => session()->get('id'));
            $hee['prof']=$joyce->jwhere1('user', 'guru', 'user.id_user=guru.id_user',$where);
        }else if (session()->get('level')==1) {
            $where=array('id_user' => session()->get('id'));
            $hee['prof']=$joyce->getWhere('user', $where);
        }else if (session()->get('level')==3) {
            $where=array('siswa.id_user' => session()->get('id'));
            $hee['prof']=$joyce->jwhere1('user', 'siswa', 'user.id_user=siswa.id_user',$where);
        } 
        echo view('header',$hee);
        echo view('absensi2');
    }
    public function forgorpass()
    {
        echo view ('forgorpass');
        
    }

public function forgot_password()
{
    $Sim = new M_belajar();
    $email = $this->request->getPost('email');

    // Check if the email exists in the database
    $user = $Sim->getWhere('user', ['username' => $email]);

    if (!$user || !is_object($user)) {
        echo "No user found with this email.";
        return;
    }

    // Generate token and expiry
    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expiry = date("Y-m-d H:i:s", strtotime("+20 minutes"));

    // Save token to the database
    $Sim->edit('user', [
        'token' => $token_hash,
        'expiry' => $expiry
    ], ['username' => $email]);

    // Reset link
    $resetLink = base_url("/home/reset_password?token=$token");

    // Create email content
    $subject = "Password Reset Request";
    $message = "
    <html>
    <head>
        <title>Password Reset Request</title>
    </head>
    <body>
        <p>Yahoo~,</p>
        <p>Seems like you have requested to reset your password. Click the link below, okay?~:</p>
        <p><a href='$resetLink' style='color: blue;'>Reset Password</a></p>
        <p>If you did not request this, ignore this email!</p>
        <p>Sincerely,</p>
        <p>Elysia <3</p>
    </body>
    </html>
    ";

    // Send the email using PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';   // Your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'youremail@gmail.com';  // Your email
        $mail->Password   = ' ';    // App password (NOT your real email password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587; 

        // Recipients
        $mail->setFrom('youremail@gmail.com', 'Elysium Hotel Website');
        $mail->addAddress($email);  

        // Content
        $mail->isHTML(true);                                
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        $data['message'] = "A password reset link has been sent to your email.";
        $data['type'] = "success";
        return view('message_view', $data);
    } catch (Exception $e) {
        $data['message'] = "Failed to send email. Error: {$mail->ErrorInfo}";
        $data['type'] = "error";
        return view('message_view', $data);
    }
}

public function reset_password()
{
    $Sim = new M_belajar();
    $token = $_GET['token'] ?? '';
    $token_hash = hash('sha256', $token); // Hash the token from the URL

    // Validate the token
    $reset = $Sim->getWhere('user', ['token' => $token_hash]);

    if (!$reset || !is_object($reset) || strtotime($reset->expiry) < time()) {
        $data['message'] = "Invalid or expired token.";
        return view('error_view', $data); // Render an error view
    }

    // Pass token to the view for the form
    $data['token'] = $token;
    return view('reset_password_view', $data); // Render the reset password view
}



public function update_password()
{
    $Sim = new M_belajar();
    $token = $_GET['token'] ?? '';
    $token_hash = hash('sha256', $token); // Ensure token is hashed consistently
    $password = $this->request->getPost('password');
    $confirmPassword = $this->request->getPost('confirm_password');

    if ($password !== $confirmPassword) {
        $data['message'] = "Passwords do not match.";
        $data['type'] = "error";
        return view('status_view', $data); // Render error view
    }

    // Set the correct timezone for comparison
    date_default_timezone_set('Asia/Jakarta');

    // Validate the token
    $reset = $Sim->getWhere('user', ['token' => $token_hash]);

    if (!$reset || !is_object($reset) || strtotime($reset->expiry) < time()) {
        $data['message'] = "Invalid or expired token.";
        $data['type'] = "error";
        return view('status_view', $data); // Render error view
    }

    // Hash the new password
    $hashedPassword = md5($password);

    // Update the user's password
    $Sim->edit('user', ['password' => $hashedPassword], ['username' => $reset->username]);

    // Delete the reset token
    $Sim->edit('user', ['token' => null, 'expiry' => null], ['username' => $reset->username]);

    $data['message'] = "Your password has been updated successfully.";
    $data['type'] = "success";
    return view('status_view', $data); // Render success view
}
} // Ini adalah penutup class Home