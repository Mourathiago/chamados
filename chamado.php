<?php 
	session_start();

	function __autoload($classe){

    	require_once 'classes/'.$classe.'.class.php';
  	}

  	include "Upload.class.php";

  	$chamado = new chamado();

	$titulo_chamado = $_POST['titulo'];
	$prioridade_chamado = $_POST['nivel'];
	$descricao_chamado = $_POST['descricao'];
	$foto = $_FILES['anexo'];
	$status_chamado = "A fazer";
    $userid = $_SESSION['user_id'];
                     
    $upload = new Upload($foto, 1000, 800, "fotos/");
    $anexo_chamado = $upload->salvar();

    $chamado -> time();

    $chamado->setTitulo_chamado($titulo_chamado);
    $chamado->setPrioridade_chamado($prioridade_chamado);
    $chamado->setDescricao_chamado($descricao_chamado);
    $chamado->setAnexo_chamado($anexo_chamado);
    $chamado->setStatus_chamado($status_chamado);
    $chamado->setUserid($userid);

    try{
    	$chamado->create();
    	header("Location: index.php?mensagem=Chamado criado com sucesso");
    } catch(Exception $e){
    	header("Location: index.php?mensagem=". $e->getMessage());
    }
?>