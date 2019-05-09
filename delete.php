<?php
	session_start();

  if(!isset($_SESSION['logged']) || $_SESSION['logged'] != true){
    header("Location: entrar.php?mensagem=Usuário não logado");
  }

  function __autoload($classe){

    require_once 'classes/'.$classe.'.class.php';
  }

  $id = $_GET['id'];

  $user = new user();

  $user->delete($id);
  header("Location: index.php?mensagem=Sucesso ao excluir usuário")

?>