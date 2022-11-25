<header id="top-header">
	<a href="<?php echo base_url('index.php')?>" id="top-title">
	<?php if($page=="databuku"){
		echo "Data Buku";
	}else if($page == "users"){
		echo "Users";
	}else{
		echo "Dashboard";
	};?></a>
	<div id="profil">
		<a href="#">
			<img src="../imgs/profil.png">
				<div class="text-lh-15 padding-right-10 profil-label">
					<h4 class="font-color-white username">Zulkarnain</h4>
					<h5 class="font-color-white text-ws email">ambarz94@live.com</h5>
				</div>					
				<i class="fa-solid fa-caret-down font-color-white"></i>
			</a>
	</div>
</header>