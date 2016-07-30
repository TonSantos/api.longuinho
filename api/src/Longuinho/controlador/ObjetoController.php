<?php 
	namespace Longuinho\controlador;

	use Longuinho\persistencia\ObjetoDAO;
	use Longuinho\entidades\Objeto;
	use Longuinho\controlador\Controlador;
	use \DateTime;

	class ObjetoController extends Controlador
	{
		private $dao;

		public function __construct()
		{
			parent::__construct( new ObjetoDAO() );
		}

		public function insert($json)
		{
			$horario = new DateTime($json->horario);
			$objeto = new Objeto(0, 
								$json->titulo,
								$json->descricao,
								$json->classificacao,
								$json->idLocal,
								$json->idCategoria,
								$horario,
								0,
								$json->idUsuario);
			$this->getDAO()->insert($objeto);

			return ["mensagem" => "Item Inserido com Sucesso!"];
		}

		public function update($id,$json)
		{}
		public function delete($id)
		{}

		public function getAllById($idLocal, $id)
		{
			if($id == null):
				$data = array();
				$result = $this->getDAO()->findAllbyId($idLocal);

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

		public function getAllByIdUser($idUsuario,$id)
		{
			if($id == null):
				$data = array();
				$result = $this->getDAO()->findAllbyIdUser($idUsuario);

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