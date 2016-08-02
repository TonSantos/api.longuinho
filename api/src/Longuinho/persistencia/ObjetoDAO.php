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

			$categoriaPersistido = $this->entityManager->find('Longuinho\entidades\Categoria', $obj->getIdCategoria());
			$obj->setIdCategoria($categoriaPersistido);

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

		public function findAllbyIdUser($idUsuario)
		{
			$em = $this->entityManager;
  			$qb = $em->createQueryBuilder();

			  $q  = $qb->select('obj')
			           ->from($this->entityPath, 'obj')
			           ->where('obj.idUsuario = '.$idUsuario)
			           ->getQuery();

			  $collection = $q->getResult();
			 

    		$data = array();
			foreach ($collection as $obj) {
				
				$data[] = $obj;
			}
			
			return $data;
		}

		public function getAllByIdCategoria($idCategoria)
		{
			$em = $this->entityManager;
  			$qb = $em->createQueryBuilder();

			  $q  = $qb->select('obj')
			           ->from($this->entityPath, 'obj')
			           ->where('obj.idCategoria = '.$idCategoria)
			           ->getQuery();

			  $collection = $q->getResult();
			 

    		$data = array();
			foreach ($collection as $obj) {
				
				$data[] = $obj;
			}
			
			return $data;
		}

		public function getAllByIdCategoriaLocal($idLocal,$idCategoria)
		{
			$em = $this->entityManager;
  			$qb = $em->createQueryBuilder();

			  $q  = $qb->select('obj')
			           ->from($this->entityPath, 'obj')
			           ->where('obj.idCategoria = '.$idCategoria)
			           ->andWhere("obj.idLocal = " .$idLocal)
			           ->getQuery();

			  $collection = $q->getResult();
			 

    		$data = array();
			foreach ($collection as $obj) {
				
				$data[] = $obj;
			}
			
			return $data;
		}

		public function update(Objeto $obj)
		{
			$usuarioPersistido = $this->entityManager->find('Longuinho\entidades\Usuario', $obj->getIdUsuario());
			$obj->setIdUsuario($usuarioPersistido);

			$localPersistido = $this->entityManager->find('Longuinho\entidades\Local', $obj->getIdLocal());
			$obj->setIdLocal($localPersistido);

			$categoriaPersistido = $this->entityManager->find('Longuinho\entidades\Categoria', $obj->getIdCategoria());
			$obj->setIdCategoria($categoriaPersistido);

			parent::update($obj);
		}
	}

?>