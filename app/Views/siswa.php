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
        /* Global Styling */
        body {
            background-color: #f4f7fc;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 500px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #667eea;
            font-weight: 600;
        }

        /* Style untuk Form */
        .form-control {
            border-radius: 8px;
            padding: 12px;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0px 0px 10px rgba(102, 126, 234, 0.5);
        }

        /* Tombol Keren */
        .btn-keren {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn-keren:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            box-shadow: 0px 5px 15px rgba(102, 126, 234, 0.4);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>siswa</h2>
    <form action="<?= base_url('home/simpan_siswa') ?>" method="post">
    <div class="mb-3">
    <label>Nama Siswa:</label>
      <input type="text" class="form-control" id="nama"name="nama" value="<?= $resdi->nama_siswa ?>">
    </div>
    <div class="mb-3">
    <label>NIS:</label>
      <input type="text" class="form-control" id="nis"name="nis" value="<?= $resdi->nis ?>">
    </div>
    <div class="mb-3">
    <label>Kelas:</label>
          <select class="form-control" name="namakelas">
    <option value="">Pilih Kelas</option>
    <?php foreach ($kelas as $key => $value) { ?>
        <option value="<?= $value->id_kelas ?>" <?= ($value->id_kelas == $resdi->id_kelas) ? 'selected' : '' ?>>
            <?= $value->nama_kelas ?>
        </option>
    <?php } ?>
</select>

        </div>
        <input type="hidden" value="<?= $resdi->id_siswa ?>" name="id">
        <button type="submit" class="btn-keren">Submit</button>
    </form>
</div>

</body>
</html>
