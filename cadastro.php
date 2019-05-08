<?php 
	session_start();

	function __autoload($classe){

    	require_once 'classes/'.$classe.'.class.php';
  	}

  	$user = new user();

	$nome_user = $_POST['nome'];
	$setor_user = $_POST['setor'];
	$login_user = $_POST['login'];
	$senha_user = md5($_POST['senha']);

    $user->setNome_user($nome_user);
    $user->setSetor_user($setor_user);
    $user->setLogin_user($login_user);
    $user->setSenha_user($senha_user);

    try{
    	$user->create();
    	header("Location: index.php?mensagem=Chamado criado com sucesso");
    } catch(Exception $e){
    	header("Location: index.php?mensagem=". $e->getMessage());
    }
?>