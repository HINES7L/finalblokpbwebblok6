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
<table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>id_guru</th>
        <th>jam_absen</th>
        <th>status</th>
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
          <td align="center"><?= $value->jam_absen ?></td>
          <td align="center"><?= $value->status ?></td>
      <?php } ?>
    </tr>
    
 
    </tbody>
  </table>

</body>
</html>
 