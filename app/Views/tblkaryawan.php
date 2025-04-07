<main id="main" class="main">

    <div class="pagetitle">
        <h1>Table Karyawan</h1>
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
                            <a href="/home/forminputkaryawan" class="text-white">Tambah</a>
                        </button>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col" width="3%">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">tempat lahir</th>
                                    <th scope="col">tanggal lahir</th>
                                    <th scope="col">jenis kelamin</th>
                                    <th scope="col">alamat</th>
                                    <th scope="col">no hp</th>
                                    <th scope="col">level</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $ms = 1;
                                foreach ($resdi as $key => $value) {
                                ?>
                                <tr>
                                    <th scope="row"><?= $ms++ ?></th>
                                    <td><?= $value->Nama ?></td>
                                      <td><?= $value->username ?></td>
                                      <td><?= $value->NIK ?></td>
                                      <td><?= $value->tempat_lahir ?></td>
                                      <td><?= $value->tanggal_lahir ?></td>
                                      <td><?= $value->jenis_kelamin ?></td>
                                      <td><?= $value->alamat ?></td>
                                      <td><?= $value->no_hp ?></td>
                                      <td><?= $value->level ?></td>
                                    <td>
                                        <button class="btn btn-info">
                                        <a href="<?= base_url('Home/edit_karyawan/'.$value->id_user)?>">
                                        <i class="fas fa-info-circle"></i>
                                        Detail
                                      </button>
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