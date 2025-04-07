<h2>Table Barang</h2>        
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>id barang</th>
        <th>nama barang</th>
        <th>stok</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $ms=1;
       foreach($resdi as $key => $value){
      ?>
      <tr>
        <td><?= $ms++ ?></td>
        <td><?= $value->id_barang ?></td>
         <td><?= $value->nama_barang ?></td>
         <td><?= $value->stok ?></td>
         <td>
          <button class="btn btn-warning">Edit</button>
          <button class="btn btn-danger">Hapus</button>
        </td>


      </tr>


    <?php 
          }
       ?>
     </tbody>

      <tr>
        <td>12345</td>
        <td>meja</td>
        <td>furniture</td>
        <td>5</td>
      </tr>
    </tbody>
  </table>