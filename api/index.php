<?php 

	$loader = require __DIR__.'/vendor/autoload.php';

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

	$app->put('/usuarios/:id', function($id) use ($usuarioCntrl){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request()->getBody());
		echo json_encode($usuarioCntrl->update($id,$json));
	});

	$app->delete('/usuarios/:id', function($id) use ($usuarioCntrl,$objetoCntrl){
		$objetoCntrl->deleteAllById($id);
		echo json_encode($usuarioCntrl->delete($id));
	});
	/********************************************************************************/
	/******************************CATEGORIA*****************************************/
	$app->get('/categorias(/(:id))', function($id = null) use ($categoriaCntrl){
		echo json_encode($categoriaCntrl->get($id));
	});

	$app->post('/categorias(/)', function() use ($categoriaCntrl,$app){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request->getBody());
		echo json_encode($categoriaCntrl->insert($json));
	});

	$app->put('/categorias/:id', function($id) use ($categoriaCntrl){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request()->getBody());
		echo json_encode($categoriaCntrl->update($id,$json));
	});

	$app->delete('/categorias/:id', function($id) use ($categoriaCntrl){
		echo json_encode($categoriaCntrl->delete($id));
	});

	/*****************************************************************************/
	/******************************CAMPUS*****************************************/
	$app->get('/campus(/(:id))', function($id = null) use ($campusCntrl){
		echo json_encode($campusCntrl->get($id));
	});
	
	$app->post('/campus(/)', function() use ($campusCntrl){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request()->getBody());
		echo json_encode($campusCntrl->insert($json));
	});

	$app->put('/campus/:id', function($id) use ($campusCntrl){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request()->getBody());
		echo json_encode($campusCntrl->update($id,$json));
	});

	$app->delete('/campus/:id', function($id) use ($campusCntrl){
		echo json_encode($campusCntrl->delete($id));
	});

	
	/*****************************************************************************/
	/******************************CENTRO*****************************************/
	$app->get('/campus/:idCampus/centros(/(:id))', function($idCampus,$id = null) use ($centroCntrl){
		echo json_encode($centroCntrl->getAllById($idCampus,$id));
	});
	

	$app->post('/centros(/)', function() use ($centroCntrl,$app){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request()->getBody());
		echo json_encode($centroCntrl->insert($json));
	});

	$app->put('/centros/:id', function($id) use ($centroCntrl){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request()->getBody());
		echo json_encode($centroCntrl->update($id,$json));
	});

	$app->delete('/centros/:id', function($id) use ($centroCntrl){
		echo json_encode($centroCntrl->delete($id));
	});

	/****************************************************************************/
	/******************************LOCAL*****************************************/
	$app->get('/campus/:idCampus/centros/:idCentro/locais(/(:id))', function($idCampus,$idCentro,$id = null) use ($localCntrl){
		echo json_encode($localCntrl->getAllById($idCentro,$id));
	});
	

	$app->post('/locais(/)', function() use ($localCntrl,$app){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request->getBody());
		echo json_encode($localCntrl->insert($json));
	});

	$app->put('/locais/:id', function($id) use ($localCntrl){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request()->getBody());
		echo json_encode($localCntrl->update($id,$json));
	});

	$app->delete('/locais/:id', function($id) use($localCntrl){
		echo json_encode($localCntrl->delete($id));
	});

	/*****************************************************************************/
	/******************************OBJETO*****************************************/
	$app->get('/campus/:idCampus/centros/:idCentro/locais/:idLocal/itens(/(:id))', function($idCampus,$idCentro,$idLocal,$id = null) use ($objetoCntrl){
		echo json_encode($objetoCntrl->getAllById($idLocal,$id));
	});
	$app->get('/locais/:idLocal/categorias/:idCategoria/itens(/(:id))', function($idLocal,$idCategoria,$id = null) use ($objetoCntrl){
		echo json_encode($objetoCntrl->getAllByIdCategoriaLocal($idLocal,$idCategoria,$id));
	});
	$app->get('/usuarios/:idUsuario/itens(/(:id))', function($idUsuario,$id = null) use ($objetoCntrl){
		echo json_encode($objetoCntrl->getAllByIdUser($idUsuario,$id));
	});
	$app->get('/categorias/:idCategoria/itens(/(:id))', function($idCategoria,$id = null) use ($objetoCntrl){
		echo json_encode($objetoCntrl->getAllByIdCategoria($idCategoria,$id));
	});
	

	$app->post('/itens(/)', function() use ($objetoCntrl,$app){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request->getBody());
		echo json_encode($objetoCntrl->insert($json));
	});

	$app->put('/itens/:id', function($id) use ($objetoCntrl){
		$app = \Slim\Slim::getInstance();
		$json = json_decode($app->request()->getBody());
		echo json_encode($objetoCntrl->update($id,$json));
	});

	$app->delete('/itens/:id', function($id) use($objetoCntrl){
		echo json_encode($objetoCntrl->delete($id));
	});

	/***********************************************************************/

	$app->run();

	echo '<br>';
	echo 'sucesso!';
	
 ?>