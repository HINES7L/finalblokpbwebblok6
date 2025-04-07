<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Absensi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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


    /* Ikon Lebih Keren */
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

    /* Tombol Keren */
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

    /* Efek Glow untuk Ikon */
    .glow-effect:hover {
        box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.8);
    }
        .card-body {
            padding: 20px;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn {
            border-radius: 5px;
        }
        .pagetitle h1 {
            font-weight: bold;
            color: #333;
        }
        .breadcrumb-item a {
            text-decoration: none;
            color: #007bff;
        }
        .logo-title {
            display: flex;
            align-items: center;
        }
        .logo-title img {
            width: 150px;
            margin-right: 15px;
        }
        .logo-title h3 {
            margin: 0;
        }
    </style>
</head>
<body>
    <main class="container py-4">

    <div class="pagetitle d-flex align-items-center justify-content-between mb-4">
    <a href="<?= base_url('home/dashboard'); ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <h1 class="m-0 text-center flex-grow-1">Laporan Absensi</h1>
</div>

<?php
          if (session()->get('level')==1 || session()->get('level')==4){ ?>
        <section class="mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="logo-title mb-3">
                        <img src="<?= base_url('foto/ph.PNG'); ?>" class="img-fluid">
                        <h3>Laporan Guru</h3>
                    </div>
                    <form action="<?= base_url('home/laporanguru') ?>" method="post" target="_blank">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="awal" class="form-label">Tanggal Awal:</label>
                                <input type="date" class="form-control" name="awal">
                            </div>
                            <div class="col-md-3">
                                <label for="akhir" class="form-label">Tanggal Akhir:</label>
                                <input type="date" class="form-control" name="akhir">
                            </div>
                            <div class="col-md-3">
                              <label for="kelas" class="form-label">Nama Guru:</label>
                              <select name="namaguru" id="namaguru" class="form-select">
                                <option>Pilih Nama Guru</option>
                                    <?php
                                     foreach ($guru as $key => $value) {
                                    ?>
                                <option value="<?= $value->nama_guru ?>"><?= $value->nama_guru ?></option>
                                    <?php
                                      }
                                    ?>
                              </select>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="fas fa-file-pdf"></i> PDF
                                </button>
                            </div>
                        </div>
                    </form>
                    <form action="<?= base_url('home/excelguru') ?>" method="POST" target="_blank" class="mt-3">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="tanggal_awal_3">Tanggal Awal:</label>
                                <input type="date" class="form-control" name="awal">
                            </div>
                            <div class="col-md-3">
                                <label for="tanggal_akhir_3">Tanggal Akhir:</label>
                                <input type="date" class="form-control" name="akhir">
                            </div>
                            <div class="col-md-3">
                              <label for="kelas" class="form-label">Nama Guru:</label>
                              <select name="namaguru" id="namaguru" class="form-select">
                                <option>Pilih Nama Guru</option>
                                    <?php
                                     foreach ($guru as $key => $value) {
                                    ?>
                                <option value="<?= $value->nama_guru ?>"><?= $value->nama_guru ?></option>
                                    <?php
                                      }
                                    ?>
                              </select>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fas fa-file-excel"></i> Excel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php } ?>
        <?php
          if (session()->get('level')==1 || session()->get('level')==2 || session()->get('level')==4 ){ ?>
        <section>
            <div class="card">
                <div class="card-body">
                    <div class="logo-title mb-3">
                        <img src="<?= base_url('foto/ph.PNG'); ?>" class="img-fluid">
                        <h3>Laporan Siswa</h3>
                    </div>
                    <form action="<?= base_url('home/laporansiswa') ?>" method="post" target="_blank">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="awal" class="form-label">Tanggal Awal:</label>
                                <input type="date" class="form-control" name="awal">
                            </div>
                            <div class="col-md-3">
                                <label for="akhir" class="form-label">Tanggal Akhir:</label>
                                <input type="date" class="form-control" name="akhir">
                                    </div>
                            
                            <div class="col-md-3"> 
                                <label for="kelas" class="form-label">Kelas:</label>
                                <select name="kelas" id="kelas" class="form-select">
                                  <option> Pilih Kelas</option>
                                    <?php
                                        foreach ($kelas as $key => $value) {
                                    ?>
                                  <option value="<?= $value->id_kelas ?>"><?= $value->nama_kelas ?></option>
                                      <?php } ?>
                               </select>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="fas fa-file-pdf"></i> PDF
                                </button>
                            </div>
                        </div>
                    </form>
                    <form action="<?= base_url('home/excelsiswa') ?>" method="POST" target="_blank" class="mt-3">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="tanggal_awal_3">Tanggal Awal:</label>
                                <input type="date" class="form-control" name="awal">
                            </div>
                            <div class="col-md-3">
                                <label for="tanggal_akhir_3">Tanggal Akhir:</label>
                                <input type="date" class="form-control" name="akhir">
                            </div>
                            <div class="col-md-3"> 
                                <label for="kelas" class="form-label">Kelas:</label>
                                <select name="kelas" id="kelas" class="form-select">
                                  <option> Pilih Kelas</option>
                                    <?php
                                        foreach ($kelas as $key => $value) {
                                    ?>
                                  <option value="<?= $value->id_kelas ?>"><?= $value->nama_kelas ?></option>
                                      <?php } ?>
                               </select>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fas fa-file-excel"></i> Excel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php } ?>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
