<?php 
	session_start();
	if(!isset($_SESSION["login"])){
		header("Location: ../login.php");
		exit;
	}
	
	require '../function.php';
	$dataHalaman = 5;
	$totalData = count(query("SELECT * FROM users"));
	$totalHalaman = ceil($totalData/$dataHalaman);
	$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
	$awalData = ($dataHalaman * $halamanAktif) - $dataHalaman;
	$dataUsers = mysqli_query($conn,"SELECT * FROM users LIMIT $awalData, $dataHalaman");

	$page = 'users';
	?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Buka Buku</title>
		<style> <?php require "../main.css" ?> </style>
		<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://kit.fontawesome.com/4e7bddb134.js" crossorigin="anonymous"></script>
	
</head>
	<body>
	<div id="container">
			<?php require '../require/sidebar.php'?>
			<div id="content">
				<?php require '../require/header.php'?>
				<main id="full" class="bg-color-gray">
					
				<nav class="btn">
					<span class="align-left bg-color">Total Data : <?php 
					if($halamanAktif > 0){
						echo $totalData ;
					} else { 
						echo "0";
					}?></span>
					<ul>
						<li class="btn-tambah" >
							<a  class="co-white" href="#">
							<i class="fa-solid fa-trash"></i>  Hapus</a>
						</li>
						<li class="btn-ubah" >
							<a  class="co-white" href="#"><i class="fa-solid fa-pen-to-square"></i>  Edit</a>
						</li>
						<li class="btn-hapus" >
							<a  class="co-white" href="pages/tambah.php"><i class="fa-solid fa-plus"></i>  Tambah</a>
						</li>
					</ul>
				</nav>
					<table border="1" cellpadding="10" cellspacing="0" >
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Email</th>
							<th>Password</th>
						</tr>
						<?php $i = $awalData + 1?>
						<?php if($totalData	> 0){?>
							<?php foreach($dataUsers as $user) : ?>
								
							<tr>
								
								<td style="padding: 5px;"><?php echo $i++ ?></td>
								<td style="padding: 5px;"><?php echo $user["username"] ?></td>
								<td style="padding: 5px;"><?php echo $user["email"] ?></td>
								<td class="hideText" style="padding: 5px;"><?php echo $user["password"] ?></td>
								
							</tr>
							<?php endforeach; ?>
						<?php } else {?>
							<tr>
							
							<td colspan="5" style="padding: 5px; text-align: center;"> Tidak ada data !</td>
							
						</tr>
						<?php }?>
					</table>
					<?php for($i = 1; $i <= $totalHalaman; $i++) :?>
						<a href="?halaman=<?php echo $i;?>"><?php echo $i;?></a>
					<?php endfor;?>
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