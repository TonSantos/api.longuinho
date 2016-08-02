<?php 
	namespace Longuinho\controlador;

	use Longuinho\persistencia\UsuarioDAO;
	use Longuinho\entidades\Usuario;

	class UsuarioController
	{
		private $dao;

		public function __construct()
		{
			$this->setDAO( new UsuarioDAO() );
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
			$user = new Usuario(0,$json->nome,$json->email,$json->matricula,$json->telefone);
			$this->getDAO()->insert($user);

			return ["mensagem" => "Usuario Inserido com Sucesso!"];
		}

		public function update($id,$json)
		{
			$user = new Usuario($id ,$json->nome,$json->email,$json->matricula,$json->telefone);
			$this->getDAO()->update($user);

			return ["mensagem" => "Usuario atualizado com Sucesso!"];
		}
		public function delete($id)
		{
			$user = $this->getDAO()->findById($id);
			$this->getDAO()->remove($user);

			return ["mensagem" => "Usuario deletado com Sucesso!"];
		}


	}

?>