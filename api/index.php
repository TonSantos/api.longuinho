<?php 

	$loader = require __DIR__.'/vendor/autoload.php';

	use Longuinho\entidades\Usuario;
	use Longuinho\persistencia\UsuarioDAO;

	$user = new Usuario(0,"Cito","aluno2@email","66666","8888888");
	$dao = new UsuarioDAO();

	$dao->insert($user);

	echo 'sucesso no insert';
	
 ?>