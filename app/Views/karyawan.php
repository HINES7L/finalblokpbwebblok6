<h2>Karyawan</h2>
  <form action="<?= base_url('home/simpan_karyawan') ?>" method="post">
    <div class="mb-3">
      <label for="Nama">Nama:</label>
      <input type="text" class="form-control" id="Nama" placeholder="Enter Nama" name="Nama" value="<?= $resdi->Nama?>">
    </div>
    <div class="mb-3">
      <label for="password">password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?= $resdi->password?>">
    </div>
    <div class="mb-3">
      <label for="username">username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?= $resdi->username?>">
    </div>
    <div class="mb-3">
      <label for="NIK">NIK:</label>
      <input type="text" class="form-control" id="NIK" placeholder="Enter NIK" name="NIK" value="<?= $resdi->NIK?>">
    </div>
    <div class="mb-3">
      <label for="tempat_lahir">tempat_lahir:</label>
      <input type="text" class="form-control" id="tempat_lahir" placeholder="Enter tempat lahir" name="tempat_lahir" value="<?= $resdi->tempat_lahir?>">
    </div>
    <div class="mb-3">
      <label for="tanggal_lahir">tanggal_lahir:</label>
      <input type="date" class="form-control" id="tanggal_lahir" placeholder="Enter tanggal lahir" name="tanggal_lahir" value="<?= $resdi->tanggal_lahir?>">
    </div>
    <div class="mb-3">
    <label for="jenis_kelamin" class="form-label">jenis_kelamin:</label>
    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" value="<?= $resdi->jenis_kelamin?>">
      <option>laki-laki</option>
      <option>perempuan</option>
    </select>
</div>
    <div class="mb-3">
      <label for="alamat">alamat:</label>
      <input type="text" class="form-control" id="alamat" placeholder="Enter alamat" name="alamat" value="<?= $resdi->alamat?>">
    </div>
    <div class="mb-3">
      <label for="no_hp">no_hp:</label>
      <input type="text" class="form-control" id="no_hp" placeholder="Enter No hp" name="no_hp" value="<?= $resdi->no_hp?>">
    </div>
    <div class="mb-3">
      <label for="level">level:</label>
      <input type="text" class="form-control" id="level" placeholder="Enter No hp" name="level" value="<?= $resdi->level?>">
    </div>
    <td>
          <input type="hidden" value="<?=$resdi->id_user?>" name="id">
      <button type="submit" class="btn btn-primary">Edit</button>
       <a href="<?=base_url('home/hapus_karyawan/'.$resdi->id_user)?>">
       <button type="button" class="btn btn-danger">Hapus
       </a></button>
        </a>
      </td>
  </form>