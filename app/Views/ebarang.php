<h2 style="font-family: sans-serif; background-color:  #f0f0f0;font-weight: bold;">EDIT BARANG</h2>

  <form action="<?= base_url('home/simpan_barang') ?>" method="post">
    <div class="mk-3">
      <label for="nama">Nama Barang :</label>
      <input type="text" class="form-control" id="nama" placeholder="Enter nama barang " name="nama" value="<?= $resdi->nama_barang?>">
    </div>
    <div class="mp-3">
      <label for="kode">Kode Barang :</label>
      <input type="text" class="form-control" id="kode_barang" placeholder="Enter kode barang" name="kode_barang"value="<?= $resdi->kode_barang?>">
    </div>
    <div class="mq-3">
      <label for="stok">Stok :</label>
      <input type="text" class="form-control" id="stok" placeholder="Enter stok" name="stok" value="<?= $resdi->stok?>">
    </div>
    <div class="mq-3">
      <label for="status">status barang :</label>
      <input type="text" class="form-control" id="status" placeholder="Enter status_barang" name="status" value="<?= $resdi->status_barang?>">
    </div>
    <tr>
      <input type="hidden" value="<?=$resdi->id_barang?>" name="id">
       <button type="submit" class="btn btn-primary">Submit</button>
    </tr>
  </form>