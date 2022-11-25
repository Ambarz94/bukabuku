<?php
	require 'admin/function.php';
	// $page = 'index';
	if(isset($_POST["register"])){
		if(registrasi($_POST) > 0){
			echo "<script>
					alert('User berhasil ditambah');
					document.location.href = 'registrasi.php';
				  </script>";
		} else {
			echo mysqli_error($conn);
		}
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Buka Buku</title>
		<style>
			<?php include "admin/main.css" ?>
		</style>
		<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://kit.fontawesome.com/4e7bddb134.js" crossorigin="anonymous"></script>
	
</head>
	<body>
		<div id="container2" class="bg-color-gray">
			<main id="main">
				<img src="<?php echo base_url('imgs/logo.png')?>">
				<form action="" method="post">
					<ul>
						<li>
							<label for="username">Username : </label>
							<input type="text" name="username" id="username" required>
						</li>
						<li>
							<label for="email">Email : </label>
							<input type="text" name="email" id="email" required>
						</li>
						<li>
							<label for="password">Password : </label>
							<input type="password" name="password" id="password" required>
						</li>
						<li>
							<label for="ulangipassword">Ulangi Password : </label>
							<input type="password" name="ulangipassword" id="ulangipassword" required>
						</li>
						<li class="btngroup">
							<button id="btn" class="cancel" onclick="location.href='login.php'" type="button">
							Batal</button>
							<button id="btn" class="ok" type="submit" name="register">Simpan</submit>
						</li>
					</ul>
				</form>
			</main>
		</div>
	</body>
</html>