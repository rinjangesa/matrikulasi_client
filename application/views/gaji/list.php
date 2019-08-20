<?php echo $this->session->flashdata('hasil'); ?>
<h1></h1>

<table  height="200px" border="1">
    <tr><th>Id gaji</th><th>Nama karyawan</th><th>lama kerja</th><th>total gaji</th></tr>
    <?php
    foreach ($gaji as $ga){
        echo "<tr>
              <td>$ga->id_gaji</td>
              <td>$ga->nama_karyawan</td>
              <td>$ga->lama_kerja</td>
              <td>$ga->total_gaji</td>
             
              </tr>";
    }
    ?>

</table>
<a href="<?php echo base_url('index.php/gaji/create') ;?>" type="button">Tambah Data</a>

