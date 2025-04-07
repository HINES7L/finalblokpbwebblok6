<!DOCTYPE html>
<html>
<head>
  <img src="<?= base_url('foto/ph.PNG');?>" width="100px">
	<title>Laporan Masuk</title>
	<style type="text/css">
		table,
		th,
		td{
		border : 1px solid black;
		border-collapse: collapse;
		}
	</style>
</head>
<body>
<h3 style="margin-top: 10px;">Laporan Barang Masuk</h3>
<br>
<table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>id Barang</th>
        <th>tanggal_masuk</th>
        <th>jumlah</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $ms=1;
      foreach ($resdi as $key =>$value){
        ?>
        <tr>
          <td align="center"><?= $ms++ ?></td>
          <td align="center"><?= $value->id_barang ?></td>
          <td align="center"><?= $value->tanggal_masuk ?></td>
          <td align="center"><?= $value->jumlah ?></td>
      <?php } ?>
    </tr>
    
 
    </tbody>
  </table>

</body>
</html>
 <script type="text/javascript">
	window.print();
 </script>