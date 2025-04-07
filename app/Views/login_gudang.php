<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Tambah Data</h2>
  <form action="/action_page.php">
    <div class="mb-3 mt-3">
      <label for="nama">Nama:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter nama" name="nama">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
 -->


<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absensi Sekolah</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/logooo.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .loader svg {
            animation: spin 1s linear infinite;
        }
    </style>
</head>
<body class="h-full flex items-center justify-center">
    <div id="preloader" class="fixed inset-0 flex items-center justify-center bg-white z-50">
        <div class="loader">
            <svg class="w-12 h-12 text-blue-500" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="4" stroke="currentColor" stroke-linecap="round"></circle>
            </svg>
        </div>
    </div>
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-xl rounded-lg">
        <div class="text-center">
            <img src="../../assets/images/logooo.png" alt="Logo" class="mx-auto w-16 h-16">
            <h2 class="mt-4 text-2xl font-bold text-gray-700">ABSENSI</h2>
            <p class="text-gray-500">Masukkan email dan password Anda</p>
        </div>
        <form id="login-form"action="<?= base_url('home/aksi_login') ?>" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" name="user" id="email" class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Email">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="pass" id="password" class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Password">
            </div>
            <div class="g-recaptcha" data-sitekey="6LcSQ-kqAAAAAA5LNHPU_Q3kLKJmPkUrZdZgM7Uu">
                    </div>
            <button type="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 transition duration-300" onclick="validateCaptcha()">Sign In</button>
        </form>
    </div>
    
    <script src='https://www.google.com/recaptcha/api.js'></script>
<script>
    function validateCaptcha() {
        var response = grecaptcha.getResponse();
        if(response.length === 0) {
            alert("Please complete the CAPTCHA before submitting.");
        } else {
            document.getElementById('login-form').submit();
        }
    }
</script>
    <script>
        window.addEventListener("load", function() {
            document.getElementById("preloader").style.display = "none";
        });
    </script>
    <script src="<?= base_url('assets/plugins/common/common.min.js')?>"></script>
    <script src="<?= base_url('assets/js/custom.min.js')?>"></script>
    <script src="<?= base_url('assets/js/settings.js')?>"></script>
    <script src="<?= base_url('assets/js/gleek.js')?>"></script>
    <script src="<?= base_url('assets/js/styleSwitcher.js')?>"></script>
</body>
</html>