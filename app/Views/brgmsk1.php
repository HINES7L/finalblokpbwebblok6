<button class="btn btn-success">+Tambah</button>

<table class="table table-bordered">
    <thead>
      <tr>
        <th width="3%">No</th>
        <th>id barang</th>
        <th width="5%">Jumlah</th>
        <th>Date</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $ms=1;
       foreach($nsychn as $key => $value){
      ?>
      <tr>
        <td><?= $ms++ ?></td>
        <td><?= $value->id_barang ?></td>
         <td><?= $value->jumlah ?></td>
         <td><?= $value->tanggal_masuk ?></td>
         <td>
          <button class="btn btn-warning">Edit</button>
          <button class="btn btn-danger">Hapus</button>
        </td>


      </tr>


    <?php 
          }
       ?>

      
    </tbody>
  </table>