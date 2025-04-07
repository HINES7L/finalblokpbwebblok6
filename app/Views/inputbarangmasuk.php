<h2>Barang</h2>
  <form action="/home/inputbrgm" method="POST">
    <table>
      <tr>
        <td>id barang</td>
        <td><input type="text" class="form-control" name="id_barang"></td>
      </tr>
      <tr>
        <td>tanggal masuk</td>
       <td><input type="date" class="form-control" name="tanggal_masuk"></td>
      </tr>
      <tr>
        <td>jumlah</td>
        <td><input type="text" class="form-control" name="jumlah"></td>
      </tr>
      <tr>
        <td>Foto</td>
        <td><input type="file" class="form-control" name="file" accept="img/" required></td>
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

</body>
</html>