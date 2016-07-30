<?php 
	namespace Longuinho\controlador;

	use Longuinho\persistencia\LocalDAO;
	use Longuinho\entidades\Local;
	use Longuinho\controlador\Controlador;

	class LocalController extends Controlador
	{
		private $dao;

		public function __construct()
		{
			parent::__construct( new LocalDAO() );
		}

		public function insert($json)
		{
			$local = new Local(0,$json->descricao,$json->idCentro);
			$this->getDAO()->insert($local);

			return ["mensagem" => "Local Inserido com Sucesso!"];
		}

		public function update($id,$json)
		{}
		public function delete($id)
		{}

		public function getAllById($idCentro,$id)
		{
			if($id == null):
				$data = array();
				$result = $this->getDAO()->findAllbyId($idCentro);

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

	}

?>