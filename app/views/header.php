<?php
session_start();
?>
<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="../../includes/img/logo2.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav justify-content-center">
							<li class="nav-item active"><a class="nav-link" href="index.php">Accueil</a></li>
							<li class="nav-item"><a class="nav-link" href="index.php#features">Features</a></li>
							<li class="nav-item"><a class="nav-link" href="index.php#licence">Licence</a></li>
							<li class="nav-item"><a class="nav-link" href="index.php#about-us">Qui somme nous ?</a></li>
							<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
							<?php if (isset ($_SESSION['idClient']) > 0): ?>
								<li class="nav-item"><a class="nav-link" href="logout.php">Deconnexion</a></li>
							<?php endif; ?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<?php if (isset ($_SESSION['idClient']) > 0): ?>
								<li class="nav-item"><a href="profil.php" class="primary_btn text-uppercase">Mon compte</a
								></li>
							<?php else: ?>
								<li class="nav-item"><a href="login.php" class="primary_btn text-uppercase">Connexion</a></li>
							<?php endif; ?>
							<li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>