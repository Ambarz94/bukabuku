<?php

	session_start();
	if(!isset($_SESSION["login"])){
		header("Location: ../login.php");
		exit;
	}

require '../function.php';
if( isset($_POST["submit"])){
	if(tambah($_POST) > 0){
		
		echo "DAta mAsuK";
	}else{
		echo "DAta gagal";
		
		var_dump (tambah($_POST));
	}
}

	$page = 'index';
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Buka Buku</title>
		<style>
  <?php include "../main.css" ?>
</style>
		<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://kit.fontawesome.com/4e7bddb134.js" crossorigin="anonymous"></script>
	
</head>
	<body>
		<div id="container">
			<?php require '../require/sidebar.php'?>
			<div id="content">
				<?php require '../require/header.php'?>
				<main id="full">
				<header style="padding: 5px;">Tambah Buku</header>
				
				<form action="" method="post" enctype="multipart/form-data">
					<ul>
						<li>
							<label for="isbn">ISBN</label>
							<input type="text" name="isbn" id="isbn" required>
						</li>
						
						<li>
							<label for="isbn">Judul</label>
							<input type="text" name="judul" id="judul">
						</li>
						
						<li>
							<label for="isbn">Penulis</label>
							<input type="text" name="penulis" id="penulis">
						</li>
						
						
						<li>
							<label for="isbn">Penerbit</label>
							<input type="text" name="penerbit" id="penerbit">
						</li>
						
						<li>
							<label for="isbn">Halaman</label>
							<input type="text" name="halaman" id="halaman">
						</li>
						
						<li>
							<label for="kategori">Kategori</label>
							<select id="kategori" name="kategori">
								<option value="">Teknologi</option>
								<option value="">Adventure</option>
								<option value="">Novel</option>
							</select>
						</li>
						<li>
							<label for="image">Image</label>
							<input type="file" id="image" name="image">
						</li>
						<li>
							<button type="submit" name="submit">Simpan</button>
						</li>
					</ul>
				</form>
				</main>
			</div>
			
		</div>
		<script>
		function openNav() {
		  document.getElementById("sidebar").style.width = "140px";
		  document.getElementById("content").style.marginLeft = "140px";
		  document.getElementById("closeNav").style.display = "block";
		  document.getElementById("openNav").style.display = "none";
			
		  document.getElementById("logo-menu").style.backgroundImage = "url(../imgs/logo.png)";
		  document.getElementById("logo-menu").style.width = "59.9px";
		  document.getElementById("logo-menu").style.height = "70px";
		  document.getElementById("logo-content").style.paddingLeft = "40px";
		}function closeNav() {
		  document.getElementById("sidebar").style.width = "50px";
		  document.getElementById("content").style.marginLeft = "50px";
		  document.getElementById("closeNav").style.display = "none";
		  document.getElementById("openNav").style.display = "block";
			
		  document.getElementById("logo-menu").style.backgroundImage = "url(../imgs/logo.png)";
		  document.getElementById("logo-menu").style.width = "34.23px";
		  document.getElementById("logo-menu").style.height = "40px";
		  
		  document.getElementById("logo-content").style.paddingLeft = "5px";
		  document.getElementById("icon-caret-right").style.display = "block";

		}
		
		</script>
	</body>
</html>