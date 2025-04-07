<h2 style="font-family: sans-serif; background-color:  #f0f0f0;font-weight: bold;">BARANG</h2>

  <form action="<?= base_url('/home/input_barang')?>" method="POST">
    <table>
      <tr>
        <td>Nama Barang</td>
        <td><input type="text" class="form-control" name="nama_barang" value="<?= $resdi->nama_barang?>"></td>
      </tr>
      <tr>
        <td>Kode Barang</td>
        <td><input type="text" class="form-control" name="kode_barang" value="<?= $resdi->kode_barang?>"></td>
      </tr>
      <tr>
        <td>Stok</td>
        <td><input type="text" class="form-control" name="stok" value="<?= $resdi->stok?>"></td>
      </tr>
      <tr>
        <td>status</td>
        <td><input type="text" class="form-control" name="status_barang" value="<?= $resdi->status_barang?>"></td>
      </tr>
      <tr>      
        <td></td>
        <td>
      <input type="submit" value="Simpan">
      <input type="reset" value="Reset">
      <input type="button" value="Kembali">
        </td>
      </tr>
    </table>
  </form>