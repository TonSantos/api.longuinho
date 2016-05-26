<?php 

	$loader = require __DIR__.'/vendor/autoload.php';

	use Longuinho\entidades\Usuario;

	$u = new Usuario();
	$u->matricula = 371827;

	echo "matricula: ".$u->matricula;

 ?>