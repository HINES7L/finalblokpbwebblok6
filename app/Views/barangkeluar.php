<h2>Barang Keluar</h2>
  <form action="<?= base_url('home/simpan_barang2') ?>" method="post">
    <div class="mb-3 mt-3">
      <label for="id barang">Id Barang:</label>
      <input type="text" class="form-control" id="id_barang" placeholder="Enter id_barang" name="id_barang" value="<?= $resdi->id_barang?>">
    </div>
    <div class="mb-3">
      <label for="tanggal keluar">Tanggal Barang Keluar:</label>
      <input type="date" class="form-control" id="tanggal_keluar" placeholder="Enter tanggal barang keluar" name="tanggal_keluar" value="<?= $resdi->tanggal_keluar?>">
    </div>
    <div class="mb-3">
      <label for="jumlah">Jumlah:</label>
      <input type="text" class="form-control" id="jumlah" placeholder="Enter jumlah" name="jumlah" value="<?= $resdi->jumlah?>">
    </div>
    <input type="hidden" value="<?=$resdi->id_bk?>" name="id">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>