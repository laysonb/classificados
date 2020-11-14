<?php
class Anuncios {
	//Listar Anuncios
	public function getMeusAnuncios() {
		global $pdo;
		$array = array();
		$sql = $pdo->prepare("SELECT *,
					(select anuncios_imagens.url from anuncios_imagens where anuncios_imagens.id_anuncio =	anuncios.id limit 1) as url
					FROM
					anuncios WHERE id_usuario =:id_usuario");

		$sql->bindValue(":id_usuario", $_SESSION['clogin']);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}
	public function getAnuncio($id) {
		$array = array();
		global $pdo;
		$sql = $pdo->prepare("SELECT * FROM anuncios WHERE id =:id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}
		return $array;
	}

	//Cadastar Anúncios
	public function addanuncios($titulo, $categoria, $descricao, $valor, $estado) {
		global $pdo;

		$sql = $pdo->prepare("INSERT INTO anuncios SET id_categoria=:id_categoria, id_usuario=:id_usuario, titulo=:titulo, descricao=:descricao, valor=:valor, estado=:estado");
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":id_usuario", $_SESSION['clogin']);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue("estado", $estado);
		$sql->execute();
	}

	public function editarAnuncio($titulo, $categoria, $descricao, $valor, $estado, $id) {
		global $pdo;
		$sql = $pdo->prepare("UPDATE anuncios SET id_categoria=:id_categoria, id_usuario=:id_usuario, titulo=:titulo, descricao=:descricao, valor=:valor, estado=:estado, id=:id");
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":id_usuario", $_SESSION['clogin']);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue("estado", $estado);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}
	public function excluirAnuncio($id) {
		global $pdo;
		$sql = $pdo->prepare("DELETE FROM anuncios_imagens WHERE id_anuncio =:id_anuncio");
		$sql->bindValue(":id_anuncio", $id);
		$sql->execute();

		$sql = $pdo->prepare("DELETE FROM anuncios  WHERE id = :id ");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}
}

?>