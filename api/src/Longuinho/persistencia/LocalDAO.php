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
			$centroPersistido = $this->entityManager->find('Longuinho\entidades\Centro', $obj->getIdCentro());
			$obj->setIdCentro($centroPersistido);
			parent::insert($obj);
		}
		public function findAllbyId($idCentro)
		{

			$em = $this->entityManager;
  			$qb = $em->createQueryBuilder();

			  $q  = $qb->select('loc')
			           ->from($this->entityPath, 'loc')
			           ->where('loc.idCentro = '.$idCentro)
			           ->getQuery();

			  $collection = $q->getResult();
			 

    		$data = array();
			foreach ($collection as $obj) {
				
				$data[] = $obj;
			}
			
			return $data;
		}
	}

?>