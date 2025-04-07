<h2>Barang masuk</h2>
  <form action="<?= base_url('home/simpan_barang1') ?>" method="post">
    <div class="mk-3">
      <label for="tanggal_masuk">tanggal_masuk :</label>
      <input type="date" class="form-control" id="tanggal_masuk" placeholder="Enter tanggal_masuk" name="tanggal_masuk" value="<?= $resdi->tanggal_masuk?>">
    </div>
    <div class="mp-3">
      <label for="tanggal_akhir">tanggal_akhir  :</label>
      <input type="date" class="form-control" id="tanggal_akhir" placeholder="Enter tanggal_akhir" name="tanggal_akhir"value="<?= $resdi->tanggal_akhir?>">
    </div>
    <tr>
      <input type="hidden" value="<?=$resdi->id_bm?>" name="id">
       <button type="submit" class="btn btn-primary">
        <i class="fas fa-file-pdf"></i></button>
    </tr>
  </form>
  <form action="<?= base_url('home/simpan_barang1') ?>" method="post">
    <div class="mk-3">
      <label for="tanggal_masuk">tanggal_masuk :</label>
      <input type="date" class="form-control" id="tanggal_masuk" placeholder="Enter tanggal_masuk" name="tanggal_masuk" value="<?= $resdi->tanggal_masuk?>">
    </div>
    <div class="mp-3">
      <label for="tanggal_akhir">tanggal_akhir  :</label>
      <input type="date" class="form-control" id="tanggal_akhir" placeholder="Enter tanggal_akhir" name="tanggal_akhir"value="<?= $resdi->tanggal_akhir?>">
    </div>
    <tr>
      <input type="hidden" value="<?=$resdi->id_bm?>" name="id">
       <button type="submit" class="btn btn-primary"><i class="fas fa-file-excel"></i></button>
    </tr>
  </form>
  <form action="<?= base_url('home/simpan_barang1') ?>" method="post">
    <div class="mk-3">
      <label for="tanggal_masuk">tanggal_masuk :</label>
      <input type="date" class="form-control" id="tanggal_masuk" placeholder="Enter tanggal_masuk" name="tanggal_masuk" value="<?= $resdi->tanggal_masuk?>">
    </div>
    <div class="mp-3">
      <label for="tanggal_akhir">tanggal_akhir  :</label>
      <input type="date" class="form-control" id="tanggal_akhir" placeholder="Enter tanggal_akhir" name="tanggal_akhir"value="<?= $resdi->tanggal_akhir?>">
    </div>
    <tr>
      <input type="hidden" value="<?=$resdi->id_bm?>" name="id">
       <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i></button>
    </tr>
  </form>
</div>

</table>
    
</form>
