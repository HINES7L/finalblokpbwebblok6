<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Sekolah</title>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
        }

        .container {
            max-width: 700px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: 2px solid #667eea;
        }

        h2 {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            transition: 0.3s;
            border: 1px solid #667eea;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
        }

        .btn-primary {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #cccccc;
            color: black;
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
            margin-top: 10px;
            width: 48%;
        }

        .btn-secondary:hover {
            background: #b0b0b0;
        }
    </style>
</head>
<div class="container mt-2">
    <h3>QR ABSENSI</h3>

    <div class="row g-3">
        <div class="col-12">
            <div class="card my-2">
                <div class="card-body px-3 pb-2">
                    <div class="table-responsive p-0">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>QR Code</th>
                                    <th>Nama Siswa</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($anjas): ?>
                                <tr>
                                    <td>
                                        <a href="<?= base_url('img/'.$anjas->code);?>">
                                        <img src="<?= base_url('img/' . $anjas->code); ?>" width="100px">
                                </a>
                                    </td>
                                    <td><?= $anjas->nama_siswa ?></td>
                                    <td><?= $anjas->nis ?></td>
                                    <td><?= $anjas->nama_kelas ?></td>

                                </tr>
                                <?php else: ?>
                                <tr>
                                    <td colspan="3">Data tidak ditemukan.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
