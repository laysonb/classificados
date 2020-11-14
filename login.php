<?php require 'pages/header.php'?>

<div class="container">
	<h1>Login</h1>
	<?php
require 'classes/Usuarios.class.php';

$u = new Usuarios();
if (isset($_POST['email']) && !empty($_POST['email'])) {
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);

	if (!empty($email) && !empty($senha)) {
		if ($u->login($email, $senha)) {
			?>
			<script type="text/javascript">window.location.href='./'</script>
			<?php
} else {
			?>
				<div class="alert alert-danger">
					Usuario e/ou senha incorrectos
				</div>
			<?php
}
	}
}
?>
	<form method="POST">
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" class="form-control">
		</div>
		<div class="form-group">
			<label for="senha">Senha</label>
			<input type="passwor" name="senha" id="senha" class="form-control">
		</div>
		<button class="btn btn-md btn-danger" >Cadastrar</button>
	</form>

<?php require 'pages/footer.php'?>