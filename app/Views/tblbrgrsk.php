<main id="main" class="main">

    <div class="pagetitle">
        <h1>Table Barang Rusak</h1>
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

                        <!-- Table with stripped rows -->
                        <button class="btn btn-success mb-3">
                            <a href="/home/forminputbrgr" class="text-white">Tambah</a>
                        </button>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col" width="3%">No</th>
                                    <th scope="col">id barang</th>
                                    <th scope="col">Tanggal_rusak</th>
                                    <th scope="col">jumlah</th>
                                    <?php
                                  if (session()->get('level')==1 || session()->get('level')==3 || session()->get('level')==4) {
                                  ?> 
                                    <th scope="col">Actions</th>
                                    <?php
                                  }
                                  ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $ms = 1;
                                foreach ($resdi as $key => $value) {
                                ?>
                                <tr>
                                    <th scope="row"><?= $ms++ ?></th>
                                    <td><?= $value->id_barang  ?></td>
                                    <td><?= $value->tanggal_rusak  ?></td>
                                    <td><?= $value->jumlah  ?></td>
                                    <?php
                                  if (session()->get('level')==1 || session()->get('level')==3 || session()->get('level')==4) {
                                  ?>
                                    <td>
                                        <a href="<?= base_url('Home/hapus_barang3/'.$value->id_barang_rusak)?>">
                                          <button class="btn btn-danger">Hapus</button>
                                          </a>
                                    </td>
                                    <?php
                                  }
                                  ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->