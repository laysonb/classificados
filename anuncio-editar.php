<?php require 'pages/header.php';?>
<?php
if (empty($_SESSION['clogin'])) {
	?>
	<script type="text/javascript">window.location.href='login.php'</script>
	<?php
exit;
}
require 'classes/Anuncios.class.php';
$anuncio = new Anuncios();
if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
	$titulo = addslashes($_POST['titulo']);
	$categoria = addslashes($_POST['categoria']);
	$valor = addslashes($_POST['valor']);
	$descricao = addslashes($_POST['descricao']);
	$estado = addslashes($_POST['estado']);

	$editar = $anuncio->editarAnuncio($titulo, $categoria, $descricao, $valor, $estado, $_GET['id']);
	?>
		<div class="alert alert-success">
			<h2>Anuncio Alterado com sucesso #&15041;</h2>
		</div>
	<?php
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$info = $anuncio->getAnuncio($_GET['id']);
} else {
	?>
	<script type="text/javascript">window.ocation.href="meus-anuncios.php"</script>
	<?php
exit;
}
?>

<div class="container">
	<h1><img src="assets/svg/insert.svg">Actualizar anúncios</h1>
	<form method="POST" enctype="multipart/form-data">

		<div class="form-group">
			<label for="categoria">Categoria</label>
			<select class="form-control" name="categoria">
	<?php
require 'classes/Categorias.class.php';
$c = new Categorias();
$cats = $c->getLista();
foreach ($cats as $cat) {
	?>
		<option value="<?php echo $cat['id']; ?>" <?php echo ($info['id_categoria'] == $cat['id']) ? 'selected="selected"' : ''; ?> ><?php echo $cat['nome']; ?></option>
	<?php
}
?>
		</select>
		</div>

		<div class="form-group">
			<label for="titulo">Título</label>
			<input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $info['titulo']; ?>">
		</div>
		<div class="form-group">
			<label for="valor">Valor</label>
			<input type="text" name="valor" id="valor" class="form-control"
			value="<?php echo $info['valor']; ?>">
		</div>
		<div class="form-group">
			<label for="descricao">Descriçao</label>
			<textarea class="form-control" name="descricao"><?php echo $info['descricao']; ?></textarea>
		</div>
		<div class="form-group">
			<label for="estado">Estado de conservação</label>
		<select name="estado" class="form-control">
			<option value="1" <?php echo ($info['estado'] == '1') ? "selected='selected'" : ""; ?> >Muito usado</option>
			<option value="2" <?php echo ($info['estado'] == '2') ? "selected='selected'" : ""; ?> >Pouco usado</option>
			<option value="3" <?php echo ($info['estado'] == '3') ? "selected='selected'" : ""; ?> >Bom</option>
			<option value="4" <?php echo ($info['estado'] == '4') ? "selected='selected'" : ""; ?> >Novo</option>
		</select>
		</div>
		<input type="submit" value="Alctualizar anúncio" class="btn btn-success"	>
	</form>
</div>

<?php require 'pages/footer.php';?>