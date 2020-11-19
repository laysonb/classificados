		<?php require 'pages/header.php'?>

<div class="container">
	<h1>Cadastre-se</h1>
<?php
require 'classes/Usuarios.class.php';

$u = new Usuarios();
if (isset($_POST['nome']) && !empty($_POST['nome'])) {
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$telefone = addslashes($_POST['telefone']);

	if (!empty($nome) && !empty($email) && !empty($senha) && !empty($telefone)) {
		if ($u->cadastrar($nome, $email, $senha, $telefone)) {
			?>
				<div class="alert alert-success">
					<strong>Parabéns </strong> Cadastrado com sucesso
					<a href="login.php" class="alert-link">Faça o login</a>
				</div>
			<?php
} else {
			?>
				<div class="alert alert-warning text-center">
					<h3>Este usuario já existe</h3>
					<a href="login.php" class="alert-link">Faça o login</a>
				</div>
			<?php
}
	} else {
		?>
			<div class="alert alert-warning">Preencha todos os dados</div>
		<?php
}

}

?>


	<form method="POST">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" name="nome" id="nome" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" class="form-control">
		</div>
		<div class="form-group">
			<label for="senha">Senha</label>
			<input type="passwor" name="senha" id="senha" class="form-control">
		</div>
		<div class="form-group">
			<label for="telefone">Telefone</label>
			<input type="tel" name="telefone" id="telefone" class="form-control">
		</div>
		<button class="btn btn-md btn-danger" >Cadastrar</button>
	</form>
<?php require 'pages/footer.php'?>