<?php

include ('../db/index.php');
include ('../autenticacao/index.php');


if(isset($_REQUEST['acao'])){

	$acao = $_REQUEST['acao'];

	switch ($acao) {
		case 'excluir':

			if(is_numeric($_GET['id'])){//se for o numero do ID
				if(odbc_exec($db, "DELETE FROM
										Usuario
									WHERE 
										idUsuario = {$_GET['id']}")){
					if(odbc_num_rows($q) > 0){
						$msg = "USUARIO EXCLUIDO COM SUCESSO";
					}else{
						$msg = "Usuario Não Existe";

					}
				}else{
						$erro = "ERRO ao Excluir Usuario";
				}
			}
			break;

		default:
		echo "Ação Invalida";
		
	}

}else{

	if(isset($_POST['btnNovoUsuario'])){

		//tratar email
		$nome = preg_replace("/[^a-zA-ZO-9]+/", "", $_POST['nome']);
		$email_exploded = explode('@', $_POST['login']);
		$email_comeco = preg_replace("/[a-zO-9._+-]+/i", $email_exploded[1], $_POST['login']);
		$email_fim = preg_replace("/[a-zO-9._+-]+/i", $email_exploded[1], $_POST['login']);
		$email  = "$email_exploded.@.$email_fim";

		//tratar senha
		$password = str_replace('"', '', $_POST['senha']);
		$password = str_replace("'", '', $_POST['senha']);
		$password = str_replace(';', '', $_POST['senha']);

		//tratar perfil
		$perfil = $_POST['perfil'] != 'A' && $_POST['perfil'] != 'C' ? 'C' : $_POST['perfil'];

		//tratar ativo
		$ativo = (bool) $_POST['ativo'];

		if (odbc_exec($db, "INSERT into Usuario (loginUsuario,
												 senhaUsuario,
												 nomeUsuario,
												 tipoPerfil,
												 usuarioAtivo)
										VALUES 
												'$email', 
												HASHBYTES("SHA1", "$password"),
												'$nome',
												'$perfil',
												'$ativo')" )){

			$msg = "USUARIO GRAVADO COM SUCESSO";	
		}else{
			$erro = "ERRO AO GRAVAR USUARIO";
		}
	}

	$q = odbc_exec($db, 'SELECT 
							idUsuario, 
							loginUsuario,
							nomeUsuario,
							tipoPerfil,
							usuarioAtivo

						FROM 
							usuario');

	$i = 0;
	while ($r = odbc_fetch_array($q)) { //
		
		$usuarios[$i] = $r;
		$i++;
	}

	include('lista_usuario_tpl.php');
}


?>