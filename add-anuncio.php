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

	$anuncio->addAnuncios($titulo, $categoria, $descricao, $valor, $estado);
	?>
		<div class="alert alert-success">
			<h2>Anuncio adicionado :)</h2>
		</div>
	<?php
}
?>

<div class="container">
	<h1><img src="assets/svg/insert.svg">Adicionar anúncios</h1>
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
		<option value="<?php echo $cat['id']; ?>"><?php echo $cat['nome']; ?></option>
	<?php
}
?>
		</select>
		</div>

		<div class="form-group">
			<label for="titulo">Título</label>
			<input type="text" name="titulo" id="titulo" class="form-control">
		</div>
		<div class="form-group">
			<label for="valor">Valor</label>
			<input type="text" name="valor" id="valor" class="form-control">
		</div>
		<div class="form-group">
			<label for="descricao">Descriçao</label>
			<textarea class="form-control" name="descricao"></textarea>
		</div>
		<div class="form-group">
			<label for="estado">Estado de conservação</label>
		<select name="estado" class="form-control">
			<option value="1">Muito usado</option>
			<option value="2">Pouco usado</option>
			<option value="3">Bom</option>
			<option value="4">Novo</option>
		</select>
		</div>
		<input type="submit" value="Cadastrar aníncio" class="btn btn-success"	>
	</form>
</div>

<?php require 'pages/footer.php';?>