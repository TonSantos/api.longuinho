<?php 
	namespace Longuinho\controlador;

	use Longuinho\persistencia\CentroDAO;
	use Longuinho\entidades\Centro;
	use Longuinho\controlador\Controlador;

	class CentroController extends Controlador
	{
		private $dao;

		public function __construct()
		{
			parent::__construct( new CentroDAO() );
		}

		public function insert($json)
		{
			$centro = new Centro($json->id,$json->descricao,$json->idCampus);
			$this->getDAO()->insert($centro);

			return ["mensagem" => "Centro Inserido com Sucesso!"];
		}

		public function update($id,$json)
		{}
		public function delete($id)
		{}

		public function getAllById($idCampus,$id)
		{
			if($id == null):
				$data = array();
				$result = $this->getDAO()->findAllbyId($idCampus);

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