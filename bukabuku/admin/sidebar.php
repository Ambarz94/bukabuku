<?php
    /* at the top of 'check.php' */
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

        /* choose the appropriate page to redirect users */
        die( header( 'location: /error.php' ) );

    }
?>
<div id="sidebar">
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
						
							<a href="index.php">
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
					<a href="logout.php">
						<i class="fa-solid fa-right-from-bracket fa-lg"></i>
						<span class="pad-t co-fff">Keluar</span>
					</a>
				</div>
			</div>