<?php

	session_start();

	$_SESSION['logged'] = false;

	session_destroy();

	header("Location: entrar.php?mensagem=Usuário saiu com succeso");

?>