<style>
    /* Global Styling */
    body {
        background-color: #f4f7fc;
        font-family: 'Poppins', sans-serif;
    }

    /* Animasi Hover untuk Card */
    .card {
        transition: all 0.3s ease-in-out;
        border-radius: 15px;
        overflow: hidden;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 15px 40px rgba(0, 0, 0, 0.3);
    }


    /* Ikon Lebih Keren */
    .icon-shape {
        padding: 18px;
        font-size: 22px;
        border-radius: 10px;
        transition: transform 0.3s, background 0.3s;
        background: rgba(255, 255, 255, 0.2);
    }
    .icon-shape:hover {
        transform: scale(1.2);
        background: rgba(255, 255, 255, 0.3);
    }

    /* Tombol Keren */
    .btn-keren {
        border-radius: 8px;
        padding: 12px 18px;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
    }
    .btn-keren:hover {
        transform: scale(1.1);
        background: linear-gradient(135deg, #ffffff 0%, #eeeeee 100%);
    }

    /* Efek Glow untuk Ikon */
    .glow-effect:hover {
        box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.8);
    }
</style>
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">DATA ABSENSI SISWA</h6>
              </div>
            </div>
            <div class="card-body px-3 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  
                  <thead>
                    <tr>
                      <th class=>No</th>
                      <th class=>Nama Siswa</th>
                      <th class=>Nama Mapel</th>
                      <th class=>Nama Guru</th>
                      <th class=>Hari</th>
                      <th class=>Sesi</th>
                      <th class=>Jam Absen</th>
                      <th class=>Status</th>
                      <th class=>Aksi</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $ms = 1;
                      foreach ($resdi as $key => $value) {
                          ?>
                    <tr>
                      <th scope="row" align="center"><?= $ms++ ?></th>    

                      <td><?= $value->nama_siswa ?></td>         
                      <td><?= $value->nama_mapel ?></td>
                      <td><?= $value->nama_guru ?></td>
                      <td><?= $value->hari ?></td>
                      
                      <td><?= $value->sesi ?></td>
                      <td><?= $value->jam_absen ?></td>
                      <td><?= $value->status ?></td>
                      <td>
                      <a href="<?= base_url('absen/edit_jadwal/'.$value->id_jadwal)?>" class="btn btn-warning">
                      <i class="material-symbols-rounded opacity-100">edit</i></a>

                      </td>
                    </tr>
                     <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>