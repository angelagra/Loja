<?php

	include('../autenticacao/controle_de_acesso.php');

	session_destroy();
	header("Location: ../autenticacao");

?>