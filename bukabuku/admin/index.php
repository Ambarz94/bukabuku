<?php
	session_start();
	if(!isset($_SESSION["login"])){
		header("Location: ../login.php");
		exit;
	}
	
	require 'function.php';
	$page = 'index';
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Buka Buku</title>
		<style>
  <?php include "main.css" ?>
</style>
		<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://kit.fontawesome.com/4e7bddb134.js" crossorigin="anonymous"></script>
	
</head>
	<body>
		<div id="container">
			<?php require 'sidebar.php'?>
			<div id="content">
				<?php require 'header.php'?>
				<!-- <main id="full"> 
					<div class="card">
						<h4 class="top-artikel">Top Artikel</h4>
						<div class="top-content">
							<h3>1. </h3>
							<img src="../imgs/asdasd.jpg">
							<div class="top-text">
								<h5 class="top-title">Buku Terbaik Tahun 2022</h5>
								<h6 class="sub-title">lorem igdgfdfgdfdgpsum sir dolor amer trie nffu</h6>
							</div>
							<div class="top-icon">
								<div class="margin-right-10">
								<i class="fa-solid fa-eye"></i>
								<h5>123</h5>
								</div>
								<div class="margin-right-10">
								<i class="fa-solid fa-heart"></i>
								<h5>213</h5>
								</div>
								<div class="margin-right-10">
								<i class="fa-solid fa-comment"></i>
								<h5>135</h5>
								</div>
							</div>
						</div>
						<div class="top-content">
							<h3>2. </h3>
							<img src="../imgs/asdasd.jpg">
							<div class="top-text">
								<h5 class="top-title">Buku Terbaik Tahun 2022</h5>
								<h6 class="sub-title">lorem igdgfdfgdfdgpsum sir dolor amer trie nffu</h6>
							</div>
							<div class="top-icon">
								<div class="margin-right-10">
								<i class="fa-solid fa-eye"></i>
								<h5>123</h5>
								</div>
								<div class="margin-right-10">
								<i class="fa-solid fa-heart"></i>
								<h5>213</h5>
								</div>
								<div class="margin-right-10">
								<i class="fa-solid fa-comment"></i>
								<h5>135</h5>
								</div>
							</div>
						</div>
						<div class="top-content">
							<h3>3. </h3>
							<img src="../imgs/asdasd.jpg">
							<div class="top-text">
								<h5 class="top-title">Buku Terbaik Tahun 2022</h5>
								<h6 class="sub-title">lorem igdgfdfgdfdgpsum sir dolor amer trie nffu</h6>
							</div>
							<div class="top-icon">
								<div class="margin-right-10">
								<i class="fa-solid fa-eye"></i>
								<h5>123</h5>
								</div>
								<div class="margin-right-10">
								<i class="fa-solid fa-heart"></i>
								<h5>213</h5>
								</div>
								<div class="margin-right-10">
								<i class="fa-solid fa-comment"></i>
								<h5>135</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="card2">
						<header class="headers">Pesan Masuk</header>
						<div class="asd">342</div>
						<!-- <img src="">
						<i class="bbb fa-solid fa-circle-user fa-lg"></i>
						
						<article>
							<h4>Ayu Maharani</h4>
							<h6>39 menit yg lalu</h6>
							<p>Bukunya sudah datadsa asdas nds fdsfg ds sdfsdf kak.</p>
						</article>
						<footer>Lihat</footer>
						<aside>Balas</aside>
					</div>
				</main>-->
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