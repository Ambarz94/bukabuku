<?php
	session_start();
	if(!isset($_SESSION["login"])){
		header("Location: ../login.php");
		exit;
	}

	require 'function.php';
	$dataHalaman = 5;
	$totalData = count(query("SELECT * FROM library"));
	$totalHalaman = ceil($totalData/$dataHalaman);
	$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
	$awalData = ($dataHalaman * $halamanAktif) - $dataHalaman;
	$databuku = mysqli_query($conn,"SELECT * FROM library LIMIT $awalData, $dataHalaman");

	$page = 'databuku';
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Buka Buku</title>
		<style> <?php include "main.css" ?> </style>
		<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://kit.fontawesome.com/4e7bddb134.js" crossorigin="anonymous"></script>
	</head>
	
	<body>
		<div id="container">
			<?php require 'sidebar.php'?>
			<div id="content">
				<?php require 'header.php'?>
				<main id="full"  class="bg-color-gray">
					<nav class="btn">
						<span class="align-left bg-color">Total Data : <?php echo $totalData ?></span>
						<ul>
							<li class="bg-color-madderLake" >
								<a  class="co-white" href="#">
								<i class="fa-solid fa-trash"></i>  Hapus</a>
							</li>
							<li class="bg-color-mediumSeaGreen" >
								<a  class="co-white" href="edit.php"><i class="fa-solid fa-pen-to-square"></i>  Edit</a>
							</li>
							<li class="bg-color-steelBlue" >
								<a  class="co-white " href="pages/tambah.php"><i class="fa-solid fa-plus"></i>  Tambah</a>
							</li>
						</ul>
					</nav>
					<table border="1" cellpadding="10" cellspacing="0" >
						<tr>
							<th>No</th>
							<th>ISBN</th>
							<th>Judul</th>
							<th>Penulis</th>
							<th>Penerbit</th>
							<th style="padding: 5px;">Halaman</th>
							<th style="padding: 5px;">Kategori</th>
							<th style="padding: 5px;">Image</th>
							<th style="padding: 5px;">Hapus</th>
						</tr>
						
						<?php $i = $awalData + 1?>
						<?php if($totalData	> 0){?>
						<?php foreach($databuku as $row) : ?>
							
						<tr>
							<td class="text-center pd-5px" style="padding: 5px;"><?php echo $i++ ?></td>
							<td style="padding: 5px;"><?php echo $row["isbn"] ?></td>
							<td style="padding: 5px;"><?php echo $row["judul"] ?></td>
							<td style="padding: 5px;"><?php echo $row["penulis"] ?></td>
							<td style="padding: 5px;"><?php echo $row["penerbit"] ?></td>
							<td class="text-center pd-5px" ><?php echo $row["halaman"] ?></td>
							<td><?php echo $row["kategori"] ?></td>
							<td><img width="50px" src="<?php echo 'imgs/' . $row['image'] ?>"></td>
							<td><a href="pages/edit.php?id=<?php echo $row["isbn"];?>" >Edit</a>
							<a href="pages/hapus.php?id=<?php echo $row["isbn"];?>" onclick="return confirm('Yakin Hapus?')">Hapus</a></td>
						</tr>
						<?php endforeach; ?>
						<?php } else {?>
						<tr>
							<td colspan="8" style="padding: 5px; text-align: center;"> Tidak ada data !</td>	
						</tr>
						<?php }?>
					</table>
					
					
					<div id="papp">
					<?php if($halamanAktif!=1 && $totalData > 0){?>
						<a <?php if($halamanAktif==$i){ echo "class='active-dashboard'";}else{echo "class='abc aaa'";}?> href="?halaman=<?php echo $halamanAktif-1;?>"><?php echo "Prev";?></a>
						<?php }?>
					<?php for($i = 1; $i <= $totalHalaman; $i++) :?>
						
						<a <?php if($halamanAktif==$i){ echo "class='active-dashboard'";}else{echo "class='abc'";}?> href="?halaman=<?php echo $i;?>"><?php echo $i;?></a>
					<?php endfor;?>
					<?php if($halamanAktif!=$totalHalaman  && $totalData > 0){?>
						<a 
						<?php 
							if($halamanAktif==$i){
								echo "class=''";
							}else{
								echo "class='abc aaa'";
							}
						?> href="?halaman= <?php echo $halamanAktif+1;?>"><?php echo "Next";?></a>
						<?php }?>
					</div>
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