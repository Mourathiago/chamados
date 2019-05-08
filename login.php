<?php
	function __autoload($classe){

    	require_once 'classes/'.$classe.'.class.php';
  	}

	$login = $_POST['login'];
	$senha = md5($_POST['senha']);

	$sql = "SELECT * FROM user WHERE login_user = :login and senha_user = :senha";
	$stmt = db::prepare($sql);
	$stmt->bindparam(':login', $login, PDO::PARAM_STR);
	$stmt->bindparam(':senha', $senha, PDO::PARAM_STR);

	if($stmt -> rowcount() <= 0){
		header("Location: entrar.php?mensagem=Login ou senha incorreto");
	}

	$stmt->execute();

	foreach ($stmt as $value) {
		session_start();

		$_SESSION['logged'] = true;
		$_SESSION['user_id'] = $value['userid'];
		$_SESSION['user_nome'] = $value['nome_user'];
		$_SESSION['user_setor'] = $value['setor_user'];

		header("Location: index.php?mensagem=Usuário logado com sucesso");
	}
?>