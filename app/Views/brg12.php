<main id="main" class="main">

    <div class="pagetitle">
        <h1>Table Barang</h1>
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
                            <a href="/home/brg2" class="text-white">Tambah</a>
                        </button>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col" width="3%">#</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Jenis Barang</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $ms = 1;
                                foreach ($resdi as $key => $value) {
                                ?>
                                <tr>
                                    <th scope="row"><?= $ms++ ?></th>
                                    <td><?= $value->nama_barang ?></td>
                                    <td><?= $value->kode_barang ?></td>
                                    <td><?= $value->stok ?></td>
                                    <td><?= $value->status_barang ?></td>
                                    <td>
                                        <a href="<?= base_url('Home/edit_barang/'.$value->id_barang)?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url('Home/hapus_barang/'.$value->id_barang)?>" class="btn btn-danger">Hapus</a>
                                    </td>
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