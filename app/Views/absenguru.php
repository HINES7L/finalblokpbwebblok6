<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Absensi Guru</title>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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

        .btn-keren {
            border-radius: 8px;
            padding: 12px 18px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn-keren:hover {
            transform: scale(1.1);
            background: linear-gradient(135deg, #ffffff 0%, #eeeeee 100%);
        }

        .table th, .table td {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="content-body">
            <main id="main" class="main">   
             <div class="pagetitle">
            <h1>Table Absensi Guru</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-4">
                        <div class="card-body">
                            <!-- <button class="btn btn-success mb-3">
                                <a href="/home/forminputabsensiguru" class="text-white text-decoration-none">Tambah</a>
                            </button> -->
                            <table class="table table-striped table-hover datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" width="5%">No</th>
                                        <th scope="col">Nama Guru</th>
                                        <th scope="col">NIK</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Jam Absen</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $ms = 1;
                                    foreach ($resdi as $key => $value) { ?>
                                    <tr>
                                        <th scope="row"> <?= $ms++ ?> </th>    
                                        <td><?= $value->nama_guru ?></td>
                                        <td><?= $value->nik ?></td>
                                        <td><?= $value->tanggal ?></td>
                                        <td><?= $value->jam_absen ?></td>
                                        <td><?= $value->status ?></td>
                                        <td>
                                            <a href="<?= base_url('Home/edit_absensiguru/'.$value->id_absenguru)?>" class="btn btn-warning">Edit</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
