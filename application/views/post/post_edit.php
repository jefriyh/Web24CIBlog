<!DOCTYPE html>
<html>
<head>
	<title>Post Edit</title>
</head>
<body>
<center> <h3>Edit Postingan</h3> </center>

<?php foreach($post as $p){ ?>

<form action="<?php echo base_url(). 'post/update'; ?>" method="post">
<table style="margin:20px auto;">
	<tr>
		<td>Judul</td>
		<td><input 
		 value="<?php echo $p->judul ?>" type="text" name="judul"></td>
	</tr>
	<tr>
		<td>Konten</td>
		<td><TextArea name="konten"><?php echo $p->konten ?></TextArea></td>
	</tr>
	<tr>
		<td>Tanggal Post</td>
		<td><input
		value="<?php echo $p->tgl_post ?>" type="date" name="tgl_post"></td>
	</tr>
	<input type="hidden" name="id" value="<?php echo $p->id_post ?>">

	<tr>
		<td><input type="submit" value="Edit"></td>
	</tr>

</table>
</form>
<?php } ?>



</body>
</html>