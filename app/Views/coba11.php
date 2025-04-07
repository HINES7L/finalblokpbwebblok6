<main id="main" class="main">

    <div class="pagetitle">
        <h1>gambar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Image Form</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h1 class="mt-5">Upload Image</h1>
    <form id="imageForm" enctype="multipart/form-data">
      <div class="form-group">
        <label for="inputText">Name</label>
        <input type="text" class="form-control" id="inputText" name="name" placeholder="Enter name" required>
      </div>
      <div class="form-group">
        <label for="formFile">Choose Image</label>
        <input type="file" class="form-control" id="formFile" name="image" accept="image/*" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit Form</button>
    </form>

    <!-- Hasil akan ditampilkan di sini -->
    <div id="result" class="mt-4" style="display: none;">
      <h3>Submission Result</h3>
      <p><strong>Name:</strong> <span id="displayName"></span></p>
      <p><strong>Image Preview:</strong></p>
      <img id="displayImage" src="#" alt="Image Preview" style="max-width: 100%; height: auto;" />
    </div>
  </div>

  <script>
    document.getElementById("imageForm").addEventListener("submit", function(event) {
      event.preventDefault(); // Mencegah pengiriman form secara default

      // Ambil nilai dari input
      const name = document.getElementById("inputText").value;
      const imageFile = document.getElementById("formFile").files[0];

      // Tampilkan nama
      document.getElementById("displayName").textContent = name;

      // Tampilkan preview gambar
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById("displayImage").src = e.target.result;
      };
      reader.readAsDataURL(imageFile);

      // Tampilkan hasil
      document.getElementById("result").style.display = "block";
    });
  </script>
</body>
</html>
</div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
