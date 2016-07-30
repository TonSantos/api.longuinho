<?php 
	namespace Longuinho\controlador;

	use Longuinho\persistencia\ObjetoDAO;
	use Longuinho\entidades\Objeto;
	use Longuinho\controlador\Controlador;

	class ObjetoController extends Controlador
	{
		private $dao;

		public function __construct()
		{
			parent::__construct( new ObjetoDAO() );
		}

		public function insert($json)
		{
			$objeto = new Objeto(0, $json->$titulo, $json->$classificacao, $json->$idLocal,0,"0000-00-00 00:00:00", 0, $json->$idUsuario);
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

	}

?>