<h2>Table Karyawan</h2>        
  <table class="table table-bordered">
  	<button><a href="/home/tambah_user">upload data</a></button>
    <thead>
      <tr>
        <th>username</th>
        <th>password</th>
        <th>level</th>
        <th>foto</th>
        <th>status</th>
    </tr>
</thead>
<tbody>
	<?php
      $ms=1;
      foreach ($resdi as $key => $value) {
        ?>
        <tr>
          <td><?=$ms++ ?></td>
          <td><?=$value->username ?></td>
          <td><?=$value->level ?></td>
          <td><?=$value->foto ?></td>
          <td><?=$value->status ?></td>
          <td>
          <a href="<?= base_url('home/edituser/'.$value->id_user)?>" class="btn btn-warning">
                      <span>Reset Password</span></a>

      </td>
    </tr>

    <?php
      }
      ?>
</tbody>
</table>