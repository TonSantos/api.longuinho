<?php 

	$loader = require __DIR__.'/vendor/autoload.php';

	use Longuinho\entidades\Usuario;
	use Longuinho\persistencia\UsuarioDAO;
	use Longuinho\entidades\Objeto;
	use Longuinho\persistencia\ObjetoDAO;
	use Longuinho\entidades\Local;
	use Longuinho\persistencia\LocalDAO;
	use Longuinho\entidades\Centro;
	use Longuinho\persistencia\CentroDAO;
	use Longuinho\entidades\Campus;
	use Longuinho\persistencia\CampusDAO;

	$user = new Usuario(0,"Rodrigo","aluno3@email","242424","8686868686");
	$dao = new UsuarioDAO();

	$dao->insert($user);

	/***********************************/

	$campus = new Campus(0,"Pici","bairro Pici,666 - Fortaleza",array());
	$campusdao = new CampusDAO();

	$campusdao->insert($campus);

	/**********************************/

	$centro = new Centro(0,"Centro de Tecnologia - CT", $campus, array());
	$centrodao = new CentroDAO();

	$centrodao->insert($centro);

	/*********************************/

	$local = new Local(0,$centro,"Bloco 707", array());
	$localdao = new LocalDAO();

	$localdao->insert($local);

	/*******************************/

	$hora = new DateTime('now');
	$objeto = new Objeto(0,"Carterinha","Perdido",$local,0,$hora,0,$user); 
	$objdao = new ObjetoDAO();

	$objdao->insert($objeto);

	echo 'sucesso no insert';
	
 ?>