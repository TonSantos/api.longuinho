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
	use Longuinho\controlador\UsuarioController;
	use Longuinho\controlador\CampusController;
	use Longuinho\controlador\CentroController;


	$app = new \Slim\Slim();

	$usuarioCntrl = new UsuarioController();
	$campusCntrl = new CampusController();
	$centroCntrl = new CentroController();

	$app->get('/', function(){
		echo json_encode([
			"api" => "Longuinho app",
			"version" => "1.0.0"
			]);
	});


	/******************************USUARIO*****************************************/
	$app->get('/usuario(/(:id))', function($id = null) use ($usuarioCntrl){
		echo json_encode($usuarioCntrl->get($id));
	});
	
	$app->post('/usuario(/)', function() use ($usuarioCntrl){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request()->getBody());
		echo json_encode($usuarioCntrl->insert($json));
	});

	$app->put('/usuario(/)', function(){
		echo "PUT\n";
	});

	$app->delete('/usuario/:id', function(){
		echo "DELETE\n";
	});
	/***********************************************************************/

	/******************************CAMPUS*****************************************/
	$app->get('/campus(/(:id))', function($id = null) use ($campusCntrl){
		echo json_encode($campusCntrl->get($id));
	});
	
	$app->post('/campus(/)', function() use ($campusCntrl){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request()->getBody());
		echo json_encode($campusCntrl->insert($json));
	});

	$app->put('/campus(/)', function(){
		echo "PUT\n";
	});

	$app->delete('/campus/:id', function(){
		echo "DELETE\n";
	});

	
	/***********************************************************************/

	/******************************CENTRO*****************************************/
	$app->get('/campus/:idCampus/centro(/(:id))', function($idCampus,$id = null) use ($centroCntrl){
		echo json_encode($centroCntrl->getAllById($idCampus,$id));
	});
	

	$app->post('/centro(/)', function() use ($campusCntrl){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request()->getBody());
		echo json_encode($campusCntrl->insert($json));
	});

	$app->put('/centro(/)', function(){
		echo "PUT\n";
	});

	$app->delete('/centro/:id', function(){
		echo "DELETE\n";
	});

	/***********************************************************************/
	$app->run();







	// $user = new Usuario(0,"Cito","aluno@email","333333","88888");
	// $dao = new UsuarioDAO();

	// $dao->insert($user);

	// /***********************************/

	// $campus = new Campus(0,"Pici","bairro Pici,666 - Fortaleza",array());
	// $campusdao = new CampusDAO();

	// // $campusdao->insert($campus);

	// $campus = $campusdao->findById(2);	

	// // /**********************************/

	// $centro = new Centro(0,"Centro de Humanidades I - CH1", $campus, array());
	// $centrodao = new CentroDAO();

	// $centrodao->insert($centro);

	// /*********************************/

	// $local = new Local(0,$centro,"Bloco 707", array());
	// $localdao = new LocalDAO();

	// $localdao->insert($local);

	// /*******************************/

	// $hora = new DateTime('now');
	// $objeto = new Objeto(0,"Carterinha","Perdido",$local,0,$hora,0,$user); 
	// $objdao = new ObjetoDAO();

	// $objdao->insert($objeto);
	echo '<br>';
	echo 'sucesso!';
	
 ?>