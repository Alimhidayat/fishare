<?php 
require 'functions.php';

if (isset($_POST['add'])) {
	// var_dump($_POST);
	// var_dump($_FILES);	#aktif setelah mengaktifkan enctype
	// die;

	if (add($_POST) > 0) {

		echo "
		<script>
			alert('Registrasi Berhasil');
			document.location.href='index.php';
		</script>
		";
	}else {
		echo "
		<script>
			alert('Registrasi Gagal');
		</script>
		";
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Register</title>
</head>
<body>
	<h1>Registrasi Akun Fishare</h1>
	<table>
		<form action="" method="post" enctype="multipart/form-data">
			<tr>
				<td><label for="name">Full Name</label></td>
				<td>:</td>
				<td><input type="text" name="name" id="name"></td>
			</tr>
			<tr>
				<td><label for="email">Email</label></td>
				<td>:</td>
				<td><input type="text" name="email" id="email"></td>
			</tr>
			<tr>
				<td><label for="university">University</label></td>
				<td>:</td>
				<td><input type="text" name="university" id="university"></td>
			</tr>

			<!-- photo -->
			<tr>
				<td><label for="photo">photo</label></td>
			</tr>
			<tr>
				<td><input type="file" name="photo" id="photo"></td>
			</tr>

			<!-- endPhoto -->
			<tr>
				<td><label for="address">Address</label></td>
				<td>:</td>
				<td><input type="text" name="address" id="address"></td>
			</tr>
			<tr>
				<td><button name="add">Registrasi</button></td>
			</tr>
		</form>
	</table>
	
</body>
</html>