<?php
	session_start();

  if(!isset($_SESSION['logged']) || $_SESSION['logged'] != true){
    header("Location: entrar.php?mensagem=Usuário não logado");
  }

  function __autoload($classe){

    require_once 'classes/'.$classe.'.class.php';
  }

  $id = $_GET['id'];

  $status_chamado = "Fazendo";

  $chamado = new chamado();
  $chamado->setStatus_chamado($status_chamado);
  $chamado->update($id);
  header("Location: ler_chamado.php?id=".$id);

?>