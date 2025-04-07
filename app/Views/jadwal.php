<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form jadwal</title>
    
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
    <h2>jadwal</h2>
    <form action="<?= base_url('home/simpan_jadwal') ?>" method="post">
        <div class="mb-3">
            <label for="id_kelas" class="form-label">ID kelas:</label>
            <input type="text" class="form-control" id="id_kelas" placeholder="Enter id_kelas" name="id_kelas" value="<?= $resdi->id_kelas ?>">
        </div>
        <div class="mb-3">
            <label for="id_mapel" class="form-label">id_mapel:</label>
            <input type="text" class="form-control" id="id_mapel" placeholder="Enter id_mapel" name="id_mapel" value="<?= $resdi->id_mapel ?>">
        </div>
        <div class="mb-3">
            <label for="id_guru" class="form-label">id_guru:</label>
            <input type="text" class="form-control" id="id_guru" placeholder="Enter id_guru" name="id_guru" value="<?= $resdi->id_guru ?>">
        </div>
        <div class="mb-3">
            <label for="hari" class="form-label">hari:</label>
            <input type="text" class="form-control" id="hari" placeholder="Enter hari" name="hari" value="<?= $resdi->hari ?>">
        </div>
        <div class="mb-3">
            <label for="sesi" class="form-label">sesi:</label>
            <input type="text" class="form-control" id="sesi" placeholder="Enter sesi" name="sesi" value="<?= $resdi->sesi ?>">
        </div>
        <div class="mb-3">
            <label for="jam_mulai" class="form-label">jam_mulai:</label>
            <input type="text" class="form-control" id="jam_mulai" placeholder="Enter jam_mulai" name="jam_mulai" value="<?= $resdi->jam_mulai ?>">
        </div>
        <div class="mb-3">
            <label for="jam_selesai" class="form-label">jam_selesai:</label>
            <input type="text" class="form-control" id="jam_selesai" placeholder="Enter jam_selesai" name="jam_selesai" value="<?= $resdi->jam_selesai ?>">
        </div>
        <input type="hidden" value="<?= $resdi->id_jadwal ?>" name="id">
        <button type="submit" class="btn-keren">Submit</button>
    </form>
</div>

</body>
</html>
