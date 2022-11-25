<?php
	session_start();
	
	if(isset($_SESSION["login"])){
		header("Location: admin/index.php");
		exit;
	}
	
	require 'admin/function.php';
	// $page = 'index';
	if(isset($_POST["login"])){
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
		
		if(mysqli_num_rows($result) === 1){
			$row = mysqli_fetch_assoc($result);
			if(password_verify($password, $row["password"])){
				$_SESSION["login"] = true;
				
				header("Location: admin/index.php");
				exit;
			}
		}
		$error = true;
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
			<main id="main" class="bg-color-fff">
			
				<img src="<?php echo base_url('imgs/logo.png')?>">
				<form action="" method="post">
					<ul>
						<li>
							<label for="username">Username : </label>
							<input type="text" name="username" id="username" required>
						</li>
						<li>
							<label for="password">Password : </label>
							<input type="password" name="password" id="password" required>
						</li>
						<?php if(isset($error)) { ?>
							<p class="co-red pd-btm-5px">Username atau Password Salah</p>
						<?php } ?>
						<li class="btngroup">
							<button id="btn" class="cancel" onclick="location.href='registrasi.php'" type="button">
							Daftar</button>
							<button id="btn" class="ok" type="submit" name="login">Login</submit>
						</li>
					</ul>
				</form>
				<button id="black" onClick="openNav()" href="">black</button>
				<button id="white" onClick="openNava()" href="">black</button>
			</main>
		</div>
		<script>
		function openNav() {
		  document.getElementById("container2").style.backgroundColor = "black";}
		
		function openNava() {
		  document.getElementById("container2").style.backgroundColor = "white";
		}
		</script>
	</body>
</html>