<?php

include('../menu/index.head.tpl.php');
include('../menu/index.body.tpl.php');

?>

<table width = "100%" border = 1>

	<tr>
		<td>ID Usuario</td>
		<td>Login</td>
		<td>Nome</td>
		<td>Perfil</td>
		<td>Ativo</td>
		<td><a href = "incluir_usuario_tpl.php">Incluir Usuario</a></td>
		
	</tr>

	<?php
		foreach ($usuarios as $usuario){
			
			echo " <tr>
						<td>{$usuario['idUsuario']}</td>
						<td>{$usuario['loginUsuario']}</td>
						<td>{$usuario['nomeUsuario']}</td>
						<td>{$usuario['tipoPerfil']}</td>
						<td>{$usuario['usuarioAtivo']}</td>

					
						<td>Editar</td>
						<td><a href = '?acao=excluir&id={$usuario['idUsuario']}'>Excluir</a></td>
						</tr>";
		}

	?>
</table>