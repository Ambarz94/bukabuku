<?php
	$conn = mysqli_connect("localhost", "root", "", "bukabuku");

	function base_url($url = null){
	$base_url = "http://localhost/project/bukabuku/admin";
	if($url != null){
		return $base_url."/".$url;
	}else{
		return $base_url;
	}
}
	function query($query){
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		if($result){
		while($row = mysqli_fetch_assoc($result)){
			$rows[] = $row;
		}
		}else{
			return $rows = [];
		}
		return $rows;
	}
	
	function tambah($data){
		global $conn;
		
		$isbn = htmlspecialchars($data["isbn"]);
		$judul = htmlspecialchars($data["judul"]);
		$penulis = htmlspecialchars($data["penulis"]);
		$penerbit = htmlspecialchars($data["penerbit"]);
		$halaman = htmlspecialchars($data["halaman"]);
		$kategori = $data["kategori"];
		$image = upload();
		
		if(!$image){
			return false;
		}
		
		$query = "INSERT INTO library
					VALUES
				('$isbn', '$judul', '$penulis', '$penerbit', '$halaman',
				'kategori', '$image')
				";
		
		mysqli_query($conn, $query);
		
		return mysqli_affected_rows($conn);
	}
	
	function edit($data){
		global $conn;
		
		$isbn = htmlspecialchars($data["isbn"]);
		$judul = htmlspecialchars($data["judul"]);
		$penulis = htmlspecialchars($data["penulis"]);
		$penerbit = htmlspecialchars($data["penerbit"]);
		$halaman = htmlspecialchars($data["halaman"]);
		$kategori = $data["kategori"];
		$gambarLama = $data["gambarLama"];
		
		if(empty($judul)){
			echo "<script>
					alert('Judul Tidak Boleh Kosong!!');
				</script>";
				return true;
		}
		if($_FILES['image']['error'] === 4){
			$image = $gambarLama;
		}else{
				$image = upload();
		
		}
		
		// if(!$image){
			// return false;
		// }
		
		$query = "UPDATE library
					SET 
					isbn = '$isbn',
					judul = '$judul', penulis = '$penulis',  penerbit = '$penerbit', halaman = '$halaman', kategori = '$kategori', image = '$image'
					WHERE isbn = '".$isbn."'
				";
		
		mysqli_query($conn, $query);
		
		// var_dump (mysqli_affected_rows($conn));die;
		return mysqli_affected_rows($conn);
	}
	
	function hapus($id){
		global $conn;
		
		mysqli_query($conn, "DELETE from library WHERE isbn ='".$id."'");
	
		return mysqli_affected_rows($conn);
	}
	
	function upload(){
		$namaFile = $_FILES["image"]["name"];
		$ukuranFile = $_FILES["image"]["size"];
		$error = $_FILES["image"]["error"];
		$tmpName = $_FILES["image"]["tmp_name"];
		
		if($error === 4){
			echo "<script>
					alert('Pilih Gambar terlebih dahulu');
				</script>";
				return true;
		}
		// var_dump($tmpName);
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
			echo "<script>
					alert('Bukan gambar');
				</script>";
				return false;
		}
		
		if($ukuranFile > 1000000){
			echo "<script>
					alert('terlalu besar');
				</script>";
				return false;
		}
		
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;
		// var_dump($namaFileBaru);die;
		
		move_uploaded_file($tmpName, '../imgs/' . $namaFileBaru);
		// move_uploaded_file(
		return $namaFileBaru;
	}
	
	function registrasi($data){
		global $conn;
		
		$username = strtolower($data["username"]);
		$email = $data["email"];
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$ulangipassword = mysqli_real_escape_string($conn, $data["ulangipassword"]);
		
		$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
		
		if(mysqli_fetch_assoc($result)){
			echo  "<script>
					alert('Username Sudah Terdaftar');
					document.location.href = '../registrasi.php';
				  </script>";
				  return false;
		}
		
		if($password !== $ulangipassword){
			echo  "<script>
					alert('Password berbeda');
				  </script>";
				  return false;
		}
		
		$password = password_hash($password, PASSWORD_DEFAULT);
		
		mysqli_query($conn, "INSERT INTO users VALUES('$username', '$email', '$password')");
		
		return mysqli_affected_rows($conn);
	}
	
	
?>