<?php
require 'config.php';
if (empty($_SESSION['clogin'])) {
//Se a sessão for vazia, redireciona para login
	header("Location: login.php");
	exit;
}

require 'classes/Anuncios.class.php';
$a = new Anuncios();

if (isset($_GET['id']) && !empty($_GET['id'])):
	$id = $_GET['id'];
	$excluir = $a->excluirAnuncio($id);
endif;
header("Location: meus-anuncios.php");