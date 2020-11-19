<?php require 'pages/header.php';?>
<?php if (empty($_SESSION['clogin'])) {
//Se a sessão for vazia, redireciona para login
	?>
	<script type="text/javascript">window.location.href='login.php'</script>
	<?php
exit;
}?>

<div class="container">
	<h1>Meus anuncios</h1>

	<a href="add-anuncio.php" class="btn btn-success botao"><img src="assets/svg/select.svg">Cadastrar anúncio</a>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Foto</th>
				<th>Título</th>
				<th>Valor</th>
				<th>Acções</th>
			</tr>
		</thead>

		<?php
require 'classes/Anuncios.class.php';
$a = new Anuncios();
$anuncios = $a->getMeusAnuncios();
foreach ($anuncios as $anuncio) {
	?>
		<tr>
			<td>
				<?php if (!empty($anuncio['url'])): ?>
				<img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>">
				<?php endif;?>
				<img src="assets/images/anuncios/widthoutimage.png">
			</td>

			<td><?php echo $anuncio['titulo']; ?></td>
			<td>AOA<?php echo number_format($anuncio['valor'], 2); ?></td>
			<td>
				<a href="anuncio-editar.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-sm btn-success">Editar</a> |
				<a href="anuncio-excluir.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-sm 	btn-danger">Excluir</a></td>
		</tr>
		<?php
}
?>
	</table>
	</div>
<?php require 'pages/footer.php';?>