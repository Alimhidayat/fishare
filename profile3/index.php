<?php 

require 'functions.php';

$tampilan = query('SELECT * FROM profile')[0];
// var_dump($tampilan);


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile Fishare</title>
</head>
<body>
	<h1>Profile <?= $tampilan['name'] ?></h1>
	<img src="img/<?= $tampilan['photo'] ?>" alt="" style="width: 60px; height: 60px; border-radius: 50%;">
	<table>
		<form action="" method="post">
			<tr>
				<td><label for="name">Full name</label></td>
				<td>:</td>
				<td><?=$tampilan['name']?></td>
			</tr>
			<tr>
				<td><label for="email">Email</label></td>
				<td>:</td>
				<td><?=$tampilan['email']?></td>
			</tr>
			<tr>
				<td><label for="">University</label></td>
				<td>:</td>
				<td><?=$tampilan['university']?></td>
			</tr>
			<tr>
				<td>Address</td>	
				<td>:</td>
				<td><?=$tampilan['address']?></td>
			</tr>
			<tr>
				<td><button><a href="update.php?id=<?=$tampilan['id']?>">Update</a></button></td>
				<td></td>
				<td><button><a href="delete.php?id=<?=$tampilan['id']?>">Delete</a></button></td>
			</tr>
		</form>
	</table>
	
</body>
</html>