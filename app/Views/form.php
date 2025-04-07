<h2>Tambah Data</h2>
  <form action="/action_page.php">
    <div class="mb-3 mt-3">
      <label for="nama">Nama:</label>
      <input type="nama" class="form-control" id="nama" placeholder="Enter nama" name="nama">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
    <div class="mb-3">
      <label for="alamat">Alamat:</label>
      <input type="alamat" class="form-control" id="alamat" placeholder="Enter alamat" name="alamat">
    </div>
    <div class="mb-3">
      <label for="id pegawai">Id Pegawai:</label>
      <input type="id pegawai" class="form-control" id="id pegawai" placeholder="Enter id pegawai" name="id pegawai">
    </div>
    <div class="mb-3">
      <label for="tanggal">Tanggal:</label>
      <input type="tanggal" class="form-control" id="tanggal" placeholder="Enter tanggal" name="tanggal">
    </div>
    <div class="container mt-3">
  <p>Jenis Kelamin:</p>
  <form action="/action_page.php">
    <label for="sel1" class="form-label">Select list (select one):</label>
    <select class="form-select" id="sel1" name="sellist1">
      <option>Laki-Laki</option>
      <option>Perempuan</option>
    </select>
  </form>
</div>
<div class="mb-3 mt-3">
      <label for="hobi">Hobi:</label>
      <input type="hobi" class="form-control" id="hobi" placeholder="Enter hobi" name="hobi">
    </div>
<div class="container mt-3">
  <p>Jabatan:</p>
  <form action="/action_page.php">
    <label for="sel1" class="form-label">Select list (select one):</label>
    <select class="form-select" id="sel1" name="sellist1">
      <option>CEO</option>
      <option>Direktur</option>
      <option>Karyawan</option>
    </select>
  </form>
</div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-primary">Reset </button>
  </form>