<?php 
	namespace Longuinho\persistencia;

	use Doctrine\ORM\EntityManager;
	use Doctrine\ORM\Tools\Setup;
	use Longuinho\persistencia\AbstractDAO;
	use Longuinho\entidades\Local;
	

	class LocalDAO extends AbstractDAO
	{
		

		public function __construct()
		{
			parent::__construct('Longuinho\entidades\Local');
		}
		public function insert(Local $obj)
		{
			$centroPersistido = $this->entityManager->find('Longuinho\entidades\Centro', $obj->getIdCentro()->getId());
			$obj->setIdCentro($centroPersistido);
			parent::insert($obj);
		}
	}

?>