<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Sekolah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            text-align: center;
        }

        /* Container utama */
        .qr-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 50px;
        }

        /* Tombol Back di pojok kiri */
        .back-button {
            position: absolute;
            left: 20px;
            top: 20px;
            background-color: rgb(102, 102, 102);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .back-button:hover {
            background-color: #c82333;
            transform: scale(1.1);
        }

        /* Video Kamera (QR Scanner) */
        #qr-video {
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            margin-top: 20px; /* Supaya ada jarak dari teks */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }


    </style>
</head>
<body>
<div class="content-body">
    <main id="main" class="main">
        <!-- Tombol Back di Pojok Kiri -->
        <a href="<?= base_url('home/login'); ?>" class="btn btn-secondary back-button">
            <i class="fas fa-arrow-left"></i> Login
        </a>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script> -->
<div class="qr-container">
<h3>Scan QR Code untuk Absensi</h3>
        <video id="qr-video" playsinline style="width: 100%; max-width: 400px; transform: scaleX(-1);"></video>
    </div>

    <script src="<?= base_url('assets/js/qr-scanner.legacy.min.js') ?>"></script>
    <script>
    console.log("Memuat QR Scanner...");

    const video = document.getElementById('qr-video');
    if (!video) {
        console.error("Elemen video tidak ditemukan!");
    }

    // Inisialisasi QR Scanner
    const scanner = new QrScanner(video, result => {
        console.log("Full Scan Result:", result); 

        // Ambil data QR code
        const qrData = result?.data || result; 
        console.log("QR Code Data:", qrData); 

        // Kirim hasil scan ke backend pakai AJAX
        fetch('<?= base_url('home/scansiswa') ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ qr_data: qrData }) // Kirim QR Code ke backend
        })
        .then(response => response.json())
        .then(data => {
            console.log("✅ Respon dari server:", data); 
            alert(data.message);
        })
        .catch(error => console.error("❌ Fetch Error:", error));

    }, { returnDetailedScanResult: true,
        //     highlightScanRegion: true, // Opsional, untuk menampilkan area scan
        // overlay: {
        //     canvas: document.createElement('canvas')
        // }
    });

    // Pastikan kamera aktif    
    scanner.start().then(() => {
        console.log("QR Scanner telah dimulai!");
    }).catch(err => {
        console.error("Gagal mengakses kamera:", err);
    });

</script>
</body>
</html>
