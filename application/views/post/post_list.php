<!DOCTYPE html>
<html>
<head>
	<title>KUMPULAN POSTINGAN</title>
</head>
<body>
<center><h1>KUMPULAN POSTINGAN</h1></center>

<?php echo anchor('post/tambah', 'Tambah Artikel');?>
<table style="margin:20px auto;" border="1">

<tr>
	<th>ID</th>
	<th>Judul</th>
	<th>Tanggal</th>
</tr>

<?php
	foreach($post as $p){
?>
<tr>
	<td><?php echo $p->id_post ?></td>
	<td><?php echo $p->judul ?></td>
	<td><?php echo $p->tgl_post ?></td>
	<td>
		<?php echo anchor('post/edit/'.$p->id_post,'Edit'); ?>
     	<?php echo anchor('post/hapus/'.$p->id_post,'Hapus'); ?>
	</td>
</tr>
<?php 	} ?>
</table>





</body>
</html>