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
		{
			$horario = new DateTime($json->horario);
			$objeto = new Objeto($id, 
								$json->titulo,
								$json->descricao,
								$json->classificacao,
								$json->idLocal,
								$json->idCategoria,
								$horario,
								0,
								$json->idUsuario);
			$this->getDAO()->update($objeto);

			return ["mensagem" => "Item atualizado com Sucesso!"];
		}
		public function delete($id)
		{
			$objeto = $this->getDAO()->findById($id);
			$this->getDAO()->remove($objeto);

			return ["mensagem" => "Item removido com Sucesso!"];
		}
		public function deleteAllById($idUsuario)
		{
			$data = array();
			$result = $this->getDAO()->findAllbyIdUser($idUsuario);
			foreach ($result as $obj) {
				$this->getDAO()->remove($obj);
			}

			return ["mensagem" => "Itens removido com Sucesso!"];
		}

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

		public function getAllByIdCategoria($idCategoria,$id)
		{
			if($id == null):
				$data = array();
				$result = $this->getDAO()->getAllByIdCategoria($idCategoria);

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
		public function getAllByIdCategoriaLocal($idLocal,$idCategoria,$id)
		{
			if($id == null):
				$data = array();
				$result = $this->getDAO()->getAllByIdCategoriaLocal($idLocal,$idCategoria);

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