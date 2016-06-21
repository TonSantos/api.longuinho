<?php 
	namespace Longuinho\persistencia;

	use Doctrine\Common\Collections\Criteria;
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
		public function findAllbyId($idCampus)
		{
			//return parent::findAll();

			$em = $this->entityManager;
  			$qb = $em->createQueryBuilder();

			  $q  = $qb->select('cen')
			           ->from($this->entityPath, 'cen')
			           ->where('cen.idCampus = '.$idCampus)
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