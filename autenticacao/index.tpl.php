<html>

<head>
	<title>Exemplo para Loja Virtual</title>
</head>

<body>
	<center>
		<form method = "post"><br><br>

			<?php
				if(isset($erro)) // se a variavel $erro estiver setado mostra uma mensagem, email ou senha errados
					echo "<font color = 'red'> $erro </font>";
			?>

			<br><br>
			E-mail: <input type= "text" name = "email"><br><br>
			Senha: <input type = "password" name = "senha"><br><br>

			<input type = "submit" value = "Entrar" name = "btn_entrar">
		</form>
	</center>
</body>
</html>