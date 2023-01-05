<?php 
$conn = mysqli_connect('localhost', 'root', '', 'fishare2');

if (mysqli_connect_errno()) {
    echo "Failed to Connect to MYSQL: " . mysqli_connect_errno();
}

function query($query){
	global $conn; 

	$result = mysqli_query($conn, $query);

	$rows = [];

	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

// Menambahkan data
function add($data){
	global $conn;

	$name = htmlspecialchars($data['name']);
	$email = htmlspecialchars($data['email']);
	$university = htmlspecialchars($data['university']);
	$address = htmlspecialchars($data['address']);

	// upload photo
	$photo = upload();
	// if (!$photo) {
	// 	return false;
	// }

	$query = "INSERT INTO profile 
				VALUES 
			  ('', '$name', '$email', '$university', '$address', '$photo');
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
// upload gambar
function upload(){

	$fileName = $_FILES['photo']['name'];
	$fileSize = $_FILES['photo']['size'];
	$fileError = $_FILES['photo']['error'];
	$tmpFile = $_FILES['photo']['tmp_name'];

	// apakah ada gambar yang diupload
	if ($fileError === 4) {
		echo "
		<script>
			alert('Pilih gambar')
		</script>
		";
		return false; 
	}

	// cek ekstensi file
	$validImageEkstension = array('jpg','jpeg','png');
	// get file Ekstension
	$imageEkstension = explode('.', $fileName);
	$imageEkstension = strtolower(end($imageEkstension));

	if (!in_array($imageEkstension, $validImageEkstension)) {
		echo "
		<script>
			alert('Upload gambar jpg,jpeg atau png');
		</script>
		";
		return false;
	}


	// upload gambar

	// generate nama gambar baru
	$newImageName = uniqid();
	$newImageName .= '.';
	$newImageName .= $imageEkstension;
	// move_uploaded_file(filename, destination)
	$result = move_uploaded_file($tmpFile, 'img/'.$newImageName);
	// var_dump($result);
	// die;

	return $newImageName;

}

// menghapus data
function delete($id){
	global $conn;

	mysqli_query($conn, "DELETE FROM profile WHERE id=$id");

	return mysqli_affected_rows($conn);
}	

// merubah data
function update($data){
	global $conn;

	$id = $data['id'];
	$name = htmlspecialchars($data['name']);
	$email = htmlspecialchars($data['email']);
	$university = htmlspecialchars($data['university']);
	$address = htmlspecialchars($data['address']);
	$oldPhoto = $data['oldPhoto'];

	if ($_FILES['photo']['error'] === 4) {
		$photo = $oldPhoto;
	} else{
		$photo = upload();
	}

	$query = "UPDATE profile SET 
			name = '$name',
			email = '$email',
			university = '$university',
			address = '$address',
			photo = '$photo'
			WHERE id = $id";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}
	


 ?>