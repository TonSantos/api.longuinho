<?php 
	namespace Longuinho\controlador;

	use Longuinho\persistencia\CategoriaDAO;
	use Longuinho\entidades\Categoria;

	class CategoriaController
	{
		private $dao;

		public function __construct()
		{
			$this->setDAO( new CategoriaDAO() );
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

		public function insert($json)
		{
			$categoria = new Categoria(0,$json->descricao);
			$this->getDAO()->insert($categoria);

			return ["mensagem" => "Categoria Inserida com Sucesso!"];
		}

		public function update($id,$json)
		{}
		public function delete($id)
		{}


	}

?>