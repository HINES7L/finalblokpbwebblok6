<main id="main" class="main">

    <div class="pagetitle">
        <h1>Table Barang Keluar</h1>
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
<img src="<?= base_url('foto/ph.PNG');?>" width="100px">
<h3>Laporan keluar</h3>
  <form action="<?= base_url('home/lapbk') ?>" method="post" target="_blank">
    <div class="container mt-3">
  <form action="/action_page.php">
    <div class="mb-3 mt-3">
    <div class="row">
    <div class="col">
      <label for="awal" class="form-label">tanggal awal:</label>
    </div>
    <div class="col">
      <label for="akhir" class="form-label">tanggal akhir:</label>
    </div>
    <div class="col" class="form-control">
       </div>

  <div class="row">
    <div class="col">
      <input type="date" class="form-control" placeholder="awal" name="awal">
    </div>
    <div class="col">
      <input type="date" class="form-control" placeholder="akhir" name="akhir">
    </div>
    <div class="col" class="form-control">
  <a href="<?= base_url('home/lapbm/')?>"><button type="print" class="btn btn-primary" ?>
  <i class="fas fa-print"></i>
            Cetak
           </button></a> 
       </div>
</form>
  <form action="<?= base_url('home/downloadPDFk') ?>" method="post"  target="_blank">
    <div class="mt-3">
    <div class="row">
    <div class="col">
      <label for="awal" class="form-label">tanggal awal:</label>
    </div>
    <div class="col">
      <label for="akhir" class="form-label">tanggal akhir:</label>
    </div>
    <div class="col" class="form-control">
       </div>

  <div class="row">
    <div class="col">
      <input type="date" class="form-control" placeholder="tanggalawal" name="awal">
    </div>
    <div class="col">
      <input type="date" class="form-control" placeholder="tanggalakhir" name="akhir">
    </div>
    <div class="col" class="form-control">
  <a href="<?= base_url('home/downloadPDFk/')?>"><button type="submit" class="btn btn-danger" ?>
  <i class="fas fa-file-pdf"></i>
            tcpdf
           </button></a> 
       </div>
</form>

<form class="mt-4" action="<?= base_url('home/excellapor_bk')?>" method="POST">
     <div class="mb-3">
    <div class="row">
        <div class="col">
            <label for="tanggal_awal_3">Tanggal Awal</label>
            <input type="date" id="tanggal_awal_3" class="form-control" name="awal">
        </div>
        <div class="col">
            <label for="tanggal_akhir_3">Tanggal Akhir</label>
            <input type="date" id="tanggal_akhir_3" class="form-control" name="akhir">
        </div>
        <div class="col d-flex align-items-end">
            <button class="btn btn-success" style="width: 100px;" formtarget="_blank">
    <i class="fas fa-file-excel"></i> EXCEL
</button>
        </div>
    </div>
</form>

</form>
</div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->