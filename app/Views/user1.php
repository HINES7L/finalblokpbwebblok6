<h2>Barang Masuk</h2>
  <form action="<?= base_url('home/simpan_user') ?>" method="post">
    <div class="mb-3 mt-3">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?= $resdi->username?>">
    </div>
    <div class="mb-3">
      <label for="password">Password:</label>
      <input type="text" class="form-control" id="password" placeholder="Enter password" name="password" value="<?= $resdi->password?>">
    </div>
    <div class="mb-3">
      <label for="level">Level:</label>
      <input type="text" class="form-control" id="level" placeholder="Enter level" name="level" value="<?= $resdi->level?>">
    </div>
    <div class="mb-3">
      <label for="foto">foto:</label>
      <input type="text" class="form-control" id="foto" placeholder="Enter foto" name="foto" value="<?= $resdi->foto?>">
    </div>
    <div class="mb-3">
      <label for="status">status:</label>
      <input type="text" class="form-control" id="status" placeholder="Enter status" name="status" value="<?= $resdi->status?>">
    </div>
    <input type="hidden" value="<?=$resdi->id_user?>" name="id">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>