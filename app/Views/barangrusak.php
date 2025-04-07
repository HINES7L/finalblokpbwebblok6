<h2>Barang Masuk</h2>
  <form action="<?= base_url('home/simpan_barang3') ?>" method="post">
    <div class="mb-3 mt-3">
      <label for="id barang">Id Barang:</label>
      <input type="text" class="form-control" id="id_barang" placeholder="Enter id_barang" name="id_barang" value="<?= $resdi->id_barang?>">
    </div>
    <div class="mb-3">
      <label for="jumlah">Jumlah:</label>
      <input type="text" class="form-control" id="jumlah" placeholder="Enter jumlah" name="jumlah" value="<?= $resdi->jumlah?>">
    </div>
    <div class="mb-3">
      <label for="tanggal_rusak">Tanggal Barang Rusak:</label>
      <input type="date" class="form-control" id="tanggal_rusak" placeholder="Enter tanggal barang rusak" name="tanggal_rusak" value="<?= $resdi->tanggal_rusak?>">
    </div>
    
    <input type="hidden" value="<?=$resdi->id_barang_rusak?>" name="id">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>