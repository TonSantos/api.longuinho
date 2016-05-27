<?php 
	namespace Longuinho\persistencia;

	use Doctrine\ORM\EntityManager;
	use Doctrine\ORM\Tools\Setup;
	use Longuinho\persistencia\AbstractDAO;
	use Longuinho\entidades\Centro;
	

	class CentroDAO extends AbstractDAO
	{
		

		public function __construct()
		{
			parent::__construct('Longuinho\entidades\Centro');
		}
		public function insert(Centro $obj)
		{
			
			$campusPersistido = $this->entityManager->find('Longuinho\entidades\Campus', $obj->getIdCampus()->getId());
			$obj->setIdCampus($campusPersistido);
			parent::insert($obj);
		}
	}

?>