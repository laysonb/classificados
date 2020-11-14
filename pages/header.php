<?php require 'config.php'?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<title>Classificados</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>

<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="navbar-header">
  <a class="navbar-brand" href="./">Classificados</a>
</div>

  <div class="collapse navbar-collapse" />
    <ul class="navbar-nav ml-auto">
    	<?php if (isset($_SESSION['clogin']) && !empty($_SESSION['clogin'])): ?>

    	<li class="nav-item active">
        	<a class="nav-link" href="meus-anuncios.php">Meus anuncios </a>
     	</li>
      	<li class="nav-item">
        	<a class="nav-link" href="sair.php">Sair</a>
      	</li>
      	<?php else: ?>
	      <li class="nav-item active">
	        <a class="nav-link" href="cadastre-se.php">Cadastre-se</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="login.php">Login</a>
	      </li>
	    <?php endif;?>
    </ul>
  </div>
</nav>
</div>