<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form siswa</title>
    
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
            margin-bottom: 20px;
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
            margin-top: 10px;
        }

        .btn-keren:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            box-shadow: 0px 5px 15px rgba(102, 126, 234, 0.4);
        }

        /* Tombol Reset dan Kembali */
        .btn-reset, .btn-kembali {
            background: #cccccc;
            color: black;
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            margin-top: 10px;
            width: 48%;
        }

        .btn-reset:hover {
            background: #b0b0b0;
        }

        .btn-kembali:hover {
            background: #a0a0a0;
        }

    </style>
</head>
<body>

<div class="container">
    <h2>absensi siswa</h2>
    <form action="/home/inputabsensisiswa" method="POST">
        <div class="mb-3">
            <label for="id_siswa" class="form-label">ID siswa:</label>
            <input type="text" class="form-control" name="id_siswa" placeholder="Masukkan ID siswa">
        </div>
        <div class="mb-3">
            <label for="jam_absen" class="form-label">Jam Absen:</label>
            <input type="text" class="form-control" name="jam_absen" placeholder="Masukkan Jam Absen">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <input type="text" class="form-control" name="status" placeholder="Masukkan status">
        </div>
        <div class="mb-3">
            <label for="id_jadwal" class="form-label">id_jadwal:</label>
            <input type="text" class="form-control" name="id_jadwal" placeholder="Masukkan id_jadwal">
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">tanggal:</label>
            <input type="text" class="form-control" name="tanggal" placeholder="Masukkan tanggal">
        </div>
        <button type="submit" class="btn-keren">Simpan</button>
        <button type="reset" class="btn-reset">Reset</button>
        <button type="button" class="btn-kembali" onclick="window.history.back();">Kembali</button>
    </form>
</div>

</body>
</html>
