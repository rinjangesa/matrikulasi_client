<?php echo form_open('gaji/create');?>
<h1>Tambah Data gaji</h1>
<table height="200px" border="1" >

<!-- <tr><td>Id gaji</td><td><?php echo form_input('id_gaji');?></td></tr> -->

<tr><td>Nama Karyawan</td><td><?php echo form_input('nama_karyawan');?></td></tr>
<tr><td>Lama Kerja</td><td><?php echo form_input('lama_kerja');?></td></tr>
<tr><td>Total gaji</td><td><?php echo form_input('total_gaji');?></td></tr>

<tr><td colspan="2">
<?php echo form_submit('submit','Simpan');?>
<?php echo anchor('gaji','Kembali');?></td></tr>
</table>
<?php
echo form_close();?>



