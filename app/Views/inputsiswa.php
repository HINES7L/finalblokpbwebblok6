<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Siswa</title>
    
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
            height: 150vh;
            padding: 20px;
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
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0px 0px 10px rgba(102, 126, 234, 0.5);
        }

        .btn-keren {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            margin-top: 10px;
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
    <h2>Form Siswa</h2>
    <form action="/home/inputsiswa" method="POST">
        <div class="mb-3">
            <label class="form-label">Foto:</label>
            <input type="file" class="form-control" name="file" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Siswa:</label>
            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Siswa" value="<?= $anjas->nama_siswa ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama User:</label>
            <input type="text" class="form-control" name="namauser" placeholder="Masukkan Nama User" value="<?= $anjas->nama_user ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">NIS:</label>
            <input type="text" class="form-control" name="nis" placeholder="Masukkan NIS" value="<?= $anjas->nis ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Kelas:</label>
            <select class="form-control" name="kelas">
            <option>Pilih Kelas</option>
              <?php
                foreach ($kelas as $key => $value) {
              ?>
            <option value="<?= $value->id_kelas ?>"><?= $value->id_kelas ?> - <?= $value->nama_kelas ?></option>
              <?php
                }
              ?>
    </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="<?= $anjas->username ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan Password" value="<?= $anjas->password ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Level:</label>
            <input type="text" class="form-control" name="level" placeholder="Masukkan Level" value="3">
        </div>

        <div class="mb-3">
            <label class="form-label">Status:</label>
            <input type="text" class="form-control" id="status" placeholder="Masukkan Level:" name="status" value="Siswa" >
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat:</label>
            <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" value="<?= $anjas->alamat ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor HP:</label>
            <input type="text" class="form-control" name="nomor" placeholder="Masukkan Nomor HP" value="<?= $anjas->no_hp ?>">
        </div>

        <input type="hidden" name="id" value="<?= $anjas->id_siswa ?>">
        <input type="hidden" name="user" value="<?= $user->id_user ?>">

        <button type="submit" class="btn-keren">Simpan</button>
    </form>
</div>

</body>
</html>