<div id="sidebar" class="bg-color-fff">
				<div id="logo-content">
					
					<img id="logo-menu" class="icon icon-logo" src="<?php echo base_url('imgs/logo.png')?>">
					<a id="closeNav" onClick="closeNav()" href="#">
						<i class="fa-solid fa-xmark fa-lg"></i>
					</a>
					<a id="openNav" onClick="openNav()" href="#">
						<i class="fa-solid fa-arrow-up-right-from-square"></i>
					</a>
				</div>
				<nav id="main-menu">
					<ul>
						<li <?php if($page=='index'){echo 'class="active-dashboard"';}?>>
						
							<a href="<?php echo base_url('index.php')?>">
								<i class="fa-solid fa-house fa-lg"></i>
								<span class="pad-t co-fff">Dashboard</span>
							</a>
						</li>
						<li  <?php if($page=='users'){echo 'class="active-dashboard"';}?>>
							<a href="<?php echo base_url('pages/users.php')?>">
								<i class="fa-solid fa-user fa-lg"></i>
								<span class="pad-t co-fff">Users</span>
							</a>
						</li>
						<li  <?php if($page=='databuku'){echo 'class="active-dashboard"';}?>>
							<a href="<?php echo base_url('databuku.php')?>">
								<i class="fa-solid fa-book fa-lg"></i>
								<span class="pad-t co-fff">Data Buku</span>
							</a>
						</li>
					</ul>
				</nav>
				<div id="footer-menu">
					<a href="../logout.php">
						<i class="fa-solid fa-right-from-bracket fa-lg"></i>
						<span class="pad-t co-fff">Keluar</span>
					</a>
				</div>
			</div>