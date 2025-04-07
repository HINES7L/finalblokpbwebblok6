<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lapor Barang rusak</title>
  <style type="text/css">
  table,
  th,
  td{
    border-collapse: collapse;
    font-family: sans-serif;
    padding: 5px;
  }
</style>
</head>
<body>

  <table>
  <tr>
    <td width="100px"><img src="<?= base_url('img/ph.png');?>" width="100px"></td>
    <td width="250%">Gudang Sekolah Permata Harapan</td>
    
  </tr>
  </table>

  <table border="1" id="my-table">

    <thead>
      <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Tanggal rusak</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $ms = 1;
      foreach ($resdi as $key => $value) {
      ?>
        <tr>
          <td align="center"><?= $ms++ ?></td>
          <td align="center"><?= $value->nama_barang ?></td>
          <td align="center"><?= $value->jumlah ?></td>
          <td align="center"><?= $value->tanggal_rusak ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  <br>

  <script>
    window.onload = () => {
        const table = document.getElementById('my-table');
        exportTable(table, 'laporan_barang_rusak.xls');
    };

    function exportTable(table, filename) {
        const tableHTML = encodeURIComponent(table.outerHTML);
        const downloadLink = document.createElement('a');

        downloadLink.href = `data:application/vnd.ms-excel,${tableHTML}`;
        downloadLink.download = filename;
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
        window.close();
    }
</script>

</body>
</html>