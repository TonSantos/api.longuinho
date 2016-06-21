<?php 
	namespace Longuinho\controlador;

	abstract class Controlador
	{
		private $dao;

		public function __construct($entityDao)
		{
			$this->setDAO($entityDao);
		}

		public function getDAO()
		{
			return $this->dao;
		}
		public function setDAO($dao)
		{
			$this->dao = $dao;
		}

		public function get($id)
		{
			if($id == null):
				$data = array();
				$result = $this->getDAO()->findAll();

				foreach ($result as $obj) {
					$data[] = $obj->toArray();
				}

			else:

				$obj = $this->getDAO()->findById($id);
			
				if($obj != null):
					$data = $obj->toArray();
				else:
					$data = [];
				endif;

			endif;

			return $data;
		}

		abstract function insert($json);

		abstract function update($id,$json);
		
		abstract function delete($id);
	
	}

?>