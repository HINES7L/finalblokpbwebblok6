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
        <h2>absensi guru</h2>
        <form action="<?= base_url('home/simpan_absensiguru') ?>" method="post">
            <!-- <div class="mb-3">
                <label for="guru" class="form-label">Nama Guru:</label>
                <input type="text" class="form-control" id="guru" name="guru" value="<?= $guru2->nama_guru ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK:</label>
                <input type="text" class="form-control" id="nik" name="nik" value="<?= $guru2->nik ?>" disabled>
            </div> -->
            <div class="mb-3">
                <label for="jam" class="form-label">Jam Absen:</label>
                <input type="time" class="form-control" id="jam" name="jam" value="<?= $absenguru->jam_absen ?>">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-control" name="status">
                            <option value="">Pilih Status</option>
                            <option value="Hadir" <?= ($absenguru->status == 'Hadir') ? 'selected' : '' ?>>Hadir</option>
                            <option value="Izin" <?= ($absenguru->status == 'Izin') ? 'selected' : '' ?>>Izin</option>
                            <option value="Sakit" <?= ($absenguru->status == 'Sakit') ? 'selected' : '' ?>>Sakit</option>
                            </select>
            </div>
            <!-- <div class="mb-3">
                <label for="id_jadwal" class="form-label">id jadwal:</label>
                <input type="text" class="form-control" id="id_jadwal" placeholder="Enter id_jadwal" name="id_jadwal" value="<?= $resdi->id_jadwal ?>">
            </div> -->

            <input type="hidden" value="<?= $absenguru->id_absenguru ?>" name="id">
            <input type="hidden" value="<?= $guru2->id_guru ?>" name="idguru">

            <button type="submit" class="btn-keren">Submit</button>
        </form>
    </div>

    </body>
    </html>
