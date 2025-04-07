<div class="container mt-3">
  <h2>Barang</h2>
  <form action="<?= base_url('home/simpan_barang') ?>" method="POST">
    <div class="mk-3">
      <label for="namabarang ">Nama Barang :</label>
      <input type="text " class="form-control" id="namabarang" placeholder="Enter nama barang" name="namabarang" value="<?=$resdi->nama_barang?>">
    </div>
    <div class="mp-3">
      <label for="kode barang ">Kode Barang :</label>
      <input type="text " class="form-control" id="kodebarang " placeholder="Enter kode barang " name="kodebarang "value="<?=$resdi->kode_barang?>">
    </div>
    <div class="mq-3">
      <label for="stok ">Stok :</label>
      <input type="text " class="form-control" id="stok" placeholder="Enter stok" name="stok"value="<?=$resdi->stok?>">
    </div>
    <div class="container ml-3">
    <label for="status" class="form-label">Status:</label>
    <select class="form-select" id="status" name="status"value="<?=$resdi->status_barang?>">
      <option>Tersedia</option>
      <option>Habis</option>
    </select>

</div>
    <tr>
<button class="btn btn-success" type="submit">Simpan</button>
<input type="hidden" value="<?=$resdi->id_barang?>" name="id">
    </tr>
  
</div>

</table>
  
</form>
</body>
</html>