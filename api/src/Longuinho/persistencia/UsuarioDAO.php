<?php 
	namespace Longuinho\persistencia;

	use Doctrine\ORM\EntityManager;
	use Doctrine\ORM\Tools\Setup;
	use Longuinho\persistencia\AbstractDAO;
	use Longuinho\entidades\Usuario;
	use Longuinho\persistencia\ObjetoDAO;
	

	class UsuarioDAO extends AbstractDAO
	{		
		
		public function __construct()
		{			
			$this->objetoDAO = new ObjetoDAO();
			parent::__construct('Longuinho\entidades\Usuario');
		}
	}

?>