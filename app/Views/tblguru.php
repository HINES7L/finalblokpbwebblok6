<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Guru</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Absensi Sekolah</li>
                    <li>
                        <a href="<?= base_url('home/dashboard')?>" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    
                    <?php
          if (session()->get('level')==3   ){ ?>
        <li>
                        <a href="<?= base_url('home/absensi')?>" aria-expanded="false">
                            <i class="fa fa-qrcode"></i> <span class="nav-text">Scan Absensi</span>
                        </a>
                    </li>
        <?php } ?>
        <?php
          if (session()->get('level')==2   ){ ?>
        <li>
                        <a href="<?= base_url('home/absensi2')?>" aria-expanded="false">
                            <i class="fa fa-qrcode"></i> <span class="nav-text">Scan Absensi</span>
                        </a>
                    </li>
        <?php } ?>
        <?php
          if (session()->get('level')==1 || session()->get('level')==4 ){ ?>
                    <li class="nav-label">Data Master</li>
                    <li>
                        <a href="<?= base_url('home/tbluser')?>" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i> <span class="nav-text">User</span>
                        </a>
                    </li>
                    <li>
                        <a  href="<?= base_url('home/tblguru')?>" aria-expanded="false">
                            <i class="icon-graduation menu-icon')?>"></i><span class="nav-text">Guru</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('home/tblsiswa')?>" aria-expanded="false">
                            <i class="icon-user menu-icon"></i> <span class="nav-text">Siswa</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php
          if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4 ){ ?>
                    <li>
                        <a href="<?= base_url('home/tblkelas')?>" aria-expanded="false">
                            <i class="icon-screen-desktop menu-icon"></i> <span class="nav-text">Kelas</span>
                        </a>
                    </li>
                    <?php } ?>

                    <!-- <li>
                        <a href="<?= base_url('home/tblmapel')?>" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">mapel</span>
                        </a>
                    </li>
                    <li class="nav-label">Forms</li>
                    <li>
                        <a href="<?= base_url('home/tbljadwal')?>" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">jadwal</span>
                        </a>
                    </li> -->
                    <?php
          if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4){ ?>
                    <li class="nav-label">DATA ABSENSI</li>
                    <?php } ?>
                    <?php
          if (session()->get('level')==1 || session()->get('level')==4){ ?>
                    <li>
                        <a href="<?= base_url('home/absensiguru')?>" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Absensi Guru</span>
                        </a>
                        <?php } ?>
                        <?php
          if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4){ ?>
                        <li>
                        <a href="<?= base_url('home/tblabsensisiswa')?>" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Absensi Siswa</span>
                        </a>
                    </li>
            
                        <li class="nav-label">Laporan</li>
                    <li>
                        <a href="<?= base_url('home/laporanm')?>" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Laporan </span>
                        </a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="<?= base_url('home/log_activity')?>" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Log Activity </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('home/logout')?>" aria-expanded="false">
                            <i class="fas fa-sign-out-alt menu-icon"></i><span class="nav-text">Logout </span>
                        </a>
                    </li>

                    </li>
                </ul>
            </div>
        </div>
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Poppins', sans-serif;
        }

        .card {
            transition: all 0.3s ease-in-out;
            border-radius: 15px;
            overflow: hidden;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 15px 40px rgba(0, 0, 0, 0.3);
        }

        .icon-shape {
            padding: 18px;
            font-size: 22px;
            border-radius: 10px;
            transition: transform 0.3s, background 0.3s;
            background: rgba(255, 255, 255, 0.2);
        }
        .icon-shape:hover {
            transform: scale(1.2);
            background: rgba(255, 255, 255, 0.3);
        }

        
        .table thead {
            background: rgba(255, 255, 255, 0.2);
        }
        .table tbody tr {
            background: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body>
<div class="content-body">
            <main id="main" class="main">
            <div class="pagetitle">
            <h1>Table Guru</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-4">
                        <button class="btn btn-success mb-3">
                            <a href="/home/forminputguru" class="text-white text-decoration-none">Tambah</a>
                        </button>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="3%">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama Guru</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $ms = 1;
                                foreach ($resdi as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $ms++ ?></th>
                                    <td><img src="<?= base_url('img/'.$value->foto);?>" width="30px"></td>
                                    <td><?= $value->nama_guru ?></td>
                                    <td><?= $value->nik ?></td>
                                    <td><?= $value->username ?></td>
                                    <td>
                                        <a href="<?= base_url('home/generateguru/'.$value->nik) ?>" class="btn btn-info">
                                            <i class="material-symbols-rounded">qr_code_scanner</i>
                                        </a>
                                        <a href="<?= base_url('Home/edit_guru/'.$value->id_guru) ?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url('Home/hapus_guru/'.$value->id_guru) ?>" class="btn btn-danger">Hapus</a>
                                        <a href="<?= base_url('Home/detailguru/'.$value->id_guru) ?>" class="btn btn-info">Detail</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <?php
          if (session()->get('level')==4 ){ ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <?php if (!empty($deleted_user)): ?>
                        <h2 class="mt-4">Data User yang Dihapus</h2>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col" width="3%">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama Guru</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $ms = 1;
                                foreach ($deleted_user as $key => $value) {
                                ?>
                                <tr>
                                    <th scope="row"><?= $ms++ ?></th>
                                    <td><img src="<?= base_url('img/'.$value->foto);?>" width="30px"></td>
                                    <td><?= $value->nama_guru ?></td>
                                    <td><?= $value->nik ?></td>
                                    <td><?= $value->username ?></td>
                                    <td>

                                            <a href="<?= base_url('home/restoreB/'.$value->id_user); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin merestore data pengguna ini?')">
                      <i class="fas fa-edit"></i> Restore
                    </a>

                                    </td>
                                </tr>
                                <?php } ?>
                                <?php else: ?>
                    <p class="text-center">Tidak ada data user yang dihapus.</p>
                <?php endif; ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    </main>
</body>
</html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
