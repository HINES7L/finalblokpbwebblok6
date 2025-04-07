<br>
<br>
<br>
<h2>Table Barang</h2>        
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>id</th>
        <th>nama</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $ms=1;
       foreach($resdi as $key => $value){
      ?>
      <tr>
        <td><?= $ms++ ?></td>
        <td><?= $value->id ?></td>
         <td><?= $value->nama ?></td>
         <td>
          <button class="btn btn-warning">Edit</button>
          <button class="btn btn-danger">Hapus</button>
        </td>
      </tr>
    <?php 
          }
       ?>
     </tbody>
    </tbody>
  </table>