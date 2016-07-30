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
	use Longuinho\controlador\LocalController;
	use Longuinho\controlador\ObjetoController;
	use Longuinho\controlador\CategoriaController;


	$app = new \Slim\Slim();

	$usuarioCntrl = new UsuarioController();
	$campusCntrl = new CampusController();
	$centroCntrl = new CentroController();
	$localCntrl = new LocalController();
	$objetoCntrl = new ObjetoController();
	$categoriaCntrl = new CategoriaController();

	$app->get('/', function(){
		echo json_encode([
			"api" => "Longuinho app",
			"version" => "1.0.0"
			]);
	});


	/******************************USUARIO*****************************************/
	$app->get('/usuarios(/(:id))', function($id = null) use ($usuarioCntrl){
		echo json_encode($usuarioCntrl->get($id));
	});
	
	$app->post('/usuarios(/)', function() use ($usuarioCntrl){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request()->getBody());
		echo json_encode($usuarioCntrl->insert($json));
	});

	$app->put('/usuarios(/)', function(){
		echo "PUT\n";
	});

	$app->delete('/usuarios/:id', function(){
		echo "DELETE\n";
	});
	/***********************************************************************/
	/******************************CATEGORIA*****************************************/
	$app->get('/categorias(/(:id))', function($id = null) use ($categoriaCntrl){
		echo json_encode($categoriaCntrl->get($id));
	});
	
	$app->post('/categorias(/)', function() use ($categoriaCntrl,$app){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request->getBody());
		echo json_encode($categoriaCntrl->insert($json));
	});

	$app->put('/categorias(/)', function(){
		echo "PUT\n";
	});

	$app->delete('/categorias/:id', function(){
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
	$app->get('/campus/:idCampus/centros(/(:id))', function($idCampus,$id = null) use ($centroCntrl){
		echo json_encode($centroCntrl->getAllById($idCampus,$id));
	});
	

	$app->post('/centros(/)', function() use ($centroCntrl,$app){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request()->getBody());
		echo json_encode($centroCntrl->insert($json));
	});

	$app->put('/centros(/)', function(){
		echo "PUT\n";
	});

	$app->delete('/centros/:id', function(){
		echo "DELETE\n";
	});

	/***********************************************************************/

	/******************************LOCAL*****************************************/
	$app->get('/campus/:idCampus/centros/:idCentro/locais(/(:id))', function($idCampus,$idCentro,$id = null) use ($localCntrl){
		echo json_encode($localCntrl->getAllById($idCentro,$id));
	});
	

	$app->post('/locais(/)', function() use ($localCntrl,$app){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request->getBody());
		echo json_encode($localCntrl->insert($json));
	});

	$app->put('/locais(/)', function(){
		echo "PUT\n";
	});

	$app->delete('/locais/:id', function(){
		echo "DELETE\n";
	});

	/***********************************************************************/

	/******************************OBJETO*****************************************/
	$app->get('/campus/:idCampus/centros/:idCentro/locais/:idLocal/itens(/(:id))', function($idCampus,$idCentro,$idLocal,$id = null) use ($objetoCntrl){
		echo json_encode($objetoCntrl->getAllById($idLocal,$id));
	});
	$app->get('/usuarios/:idUsuario/itens(/(:id))', function($idUsuario,$id = null) use ($objetoCntrl){
		echo json_encode($objetoCntrl->getAllByIdUser($idUsuario,$id));
	});
	

	$app->post('/itens(/)', function() use ($objetoCntrl,$app){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request->getBody());
		echo json_encode($objetoCntrl->insert($json));
	});

	$app->put('/itens(/)', function(){
		echo "PUT\n";
	});

	$app->delete('/itens/:id', function(){
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