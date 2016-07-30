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
			$usuarioPersistido = $this->entityManager->find('Longuinho\entidades\Usuario', $obj->getIdUsuario());
			$obj->setIdUsuario($usuarioPersistido);

			$localPersistido = $this->entityManager->find('Longuinho\entidades\Local', $obj->getIdLocal());
			$obj->setIdLocal($localPersistido);

			parent::insert($obj);
		}
		public function findAllbyId($idLocal)
		{

			$em = $this->entityManager;
  			$qb = $em->createQueryBuilder();

			  $q  = $qb->select('obj')
			           ->from($this->entityPath, 'obj')
			           ->where('obj.idLocal = '.$idLocal)
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