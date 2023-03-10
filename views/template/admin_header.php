<!DOCTYPE html>
<html>

<head>
	<!-- Etiquetas META -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Título de la web -->
	<title>Admin | <?= $this->page_title ?></title>
	<!-- Favicon web -->
	<link rel="apple-touch-icon" sizes="180x180" href="assets/fav/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/fav/favicon-16x16.png">

	<!-- Bootstrap CSS Externo -->
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
	<link href="assets/fontawesome/css/brands.css" rel="stylesheet">
	<link href="assets/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
	<header class="mb-1 container-fluid">
		<div class="row">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Offcanvas navbar large">
				<div class="container-fluid">
					<a class="navbar-brand" href="index.php?controller=home&action=index">ZOOMVC</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
						<div class="offcanvas-header">
							<h5 class="offcanvas-title" id="offcanvasNavbarLabel">ZOOMVC</h5>
							<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>
						<div class="offcanvas-body">
							<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
								<li class="nav-item">
									<a class="nav-link<?php if ($this->active === 'inicio') {
															echo ' active';
														} ?>" href="index.php?controller=user">Inicio</a>
								</li>
								<li class="nav-item">
									<a class="nav-link<?php if ($this->active === 'perfil') {
															echo ' active';
														} ?>" href="index.php?controller=admin&&action=perfil">Perfil</a>
								</li>
								<li class="nav-item">
									<a class="nav-link<?php if ($this->active === 'usuarios') {
															echo ' active';
														} ?>" href="index.php?controller=admin_usuarios">USUARIOS</a>
								</li>
								<li class="nav-item">
									<a class="nav-link<?php if ($this->active === 'animales') {
															echo ' active';
														} ?>" href="index.php?controller=admin_animales">Animales</a>
								</li>
								<li class="nav-item">
									<a class="nav-link<?php if ($this->active === 'especies') {
															echo ' active';
														} ?>" href="index.php?controller=admin_especies">Especies</a>
								</li>
								<li class="nav-item">
									<a class="nav-link<?php if ($this->active === 'zoo') {
															echo ' active';
														} ?>" href="index.php?controller=admin_zoos">Zoo</a>
								</li>
								<li class="nav-item">
									<a class="nav-link<?php if ($this->active === 'logout') {
															echo ' active';
														} ?>" href="index.php?controller=auth&action=logout">LOGOUT</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<div class="container">
		<div class="col-12 text-center text-bg-warning py-3 mb-3 rounded">
			<h1><?= $this->page_title ?></h1>
			<p class="small"> ADMIN DASHBOARD </p>
		</div>
		<?= $this->get_message(); ?>
	</div>