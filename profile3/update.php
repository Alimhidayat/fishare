<?php 
require 'functions.php';
$id = $_GET['id'];

$getData = query("SELECT * from profile WHERE id=$id")[0]; 
// var_dump($getData);
// die;

if (isset($_POST['update'])) {

	// $hasil = update($_POST);
	// echo $hasil;
	// die;
	if (update($_POST) > 0) {
		echo "
		<script>
			alert('Update Berhasil');
			document.location.href='index.php';
		</script>
		";
	}else {
		echo "
		<script>
			alert('Update Gagal');
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
	<h1>Update Akun Fishare</h1>
	<table>
		<form action="" method="post" enctype="multipart/form-data">
			<tr>
				<td><input type="hidden" name="id" value="<?=$getData['id']?>"></td>
				<td><input type="hidden" name="oldPhoto" value="<?=$getData['photo']?>"> </td>
			</tr>
			<tr>
				<td><label for="name">Full Name</label></td>
				<td>:</td>
				<td><input type="text" name="name" id="name" value="<?=$getData['name']?>"></td>
			</tr>
			<tr>
				<td><label for="email">Email</label></td>
				<td>:</td>
				<td><input type="text" name="email" id="email" value="<?=$getData['email']?>"></td>
			</tr>
			<tr>
				<td><label for="university">University</label></td>
				<td>:</td>
				<td><input type="text" name="university" id="university" value="<?=$getData['university']?>"> </td>
			</tr>
			<tr>
				<td><label for="photo">Photo</label></td>
				<td>:</td>
			</tr>
			<tr>
				<td>
					<img src="img/<?=$getData['photo']?>" alt="" style="width: 70px; height: 70px;">
				</td>
				<td></td>
				<td><input type="file" name="photo"></td>

			</tr>
			<tr>
				<td><label for="address">Address</label></td>
				<td>:</td>
				<td><input type="text" name="address" id="address" value="<?=$getData['address']?>"></td>
			</tr>
			<tr>
				<td><button name="update">update</button></td>
			</tr>
		</form>
	</table>
	
</body>
</html>