<?php 
	namespace Longuinho\persistencia;

	use Doctrine\ORM\EntityManager;
	use Doctrine\ORM\Tools\Setup;
	use Longuinho\persistencia\AbstractDAO;
	use Longuinho\entidades\Objeto;
	

	class ObjetoDAO extends AbstractDAO
	{
		

		public function __construct()
		{
			parent::__construct('Longuinho\entidades\Objeto');
		}

		public function insert(Objeto $obj)
		{
			$usuarioPersistido = $this->entityManager->find('Longuinho\entidades\Usuario', $obj->getIdUsuario()->getId());
			$obj->setIdUsuario($usuarioPersistido);

			$localPersistido = $this->entityManager->find('Longuinho\entidades\Local', $obj->getIdLocal()->getId());
			$obj->setIdLocal($localPersistido);

			parent::insert($obj);
		}
	}

?>