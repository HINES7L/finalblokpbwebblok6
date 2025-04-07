<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Guru</title>
    
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
            height: 200vh;
        }

        .container {
            max-width: 500px;
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
<body>
    <div class="container">
        <h2>Form Guru</h2>
        <form action="/home/saveiguru" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Foto:</label>
                <input type="file" class="form-control" name="file" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Guru:</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Guru" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama User:</label>
                <input type="text" class="form-control" name="user" placeholder="Masukkan Nama User" required>
            </div>
            <div class="mb-3">
                <label class="form-label">NIK:</label>
                <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Username:</label>
                <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Level:</label>
                <input type="text" class="form-control" name="level" placeholder="Masukkan Level" value="2">
            </div>
            <div class="mb-3">
                <label class="form-label">Status:</label>
                <input type="text" class="form-control" id="status" placeholder="Masukkan Level:" name="status" value="Guru">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat:</label>
                <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor HP:</label>
                <input type="text" class="form-control" name="nomor" placeholder="Masukkan Nomor HP" required>
            </div>
            <button type="submit" class="btn-primary">Simpan</button>
            <button type="reset" class="btn-secondary">Reset</button>
            <button type="button" class="btn-secondary" onclick="window.history.back();">Kembali</button>
        </form>
    </div>
</body>
</html>
