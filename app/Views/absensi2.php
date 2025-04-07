<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code</title>
</head>
<body>

    <div class="container mt-3">
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
        fetch('<?= base_url('home/scanguru') ?>', {
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