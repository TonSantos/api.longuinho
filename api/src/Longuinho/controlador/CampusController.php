<?php 
	namespace Longuinho\controlador;

	use Longuinho\persistencia\CampusDAO;
	use Longuinho\entidades\Campus;
	use Longuinho\controlador\Controlador;

	class CampusController extends Controlador
	{
		private $dao;

		public function __construct()
		{
			parent::__construct( new CampusDAO() );
		}

		public function insert($json)
		{
			$campus = new Campus(0,$json->descricao,$json->endereco);
			$this->getDAO()->insert($campus);

			return ["mensagem" => "Campus Inserido com Sucesso!"];
		}

		public function update($id,$json)
		{
			$campus = new Campus($id,$json->descricao,$json->endereco);
			$this->getDAO()->update($campus);

			return ["mensagem" => "Campus Atualizado com Sucesso!"];
		}
		public function delete($id)
		{
			$campus = $this->getDAO()->findById($id);
			$this->getDAO()->remove($campus);

			return ["mensagem" => "Campus removido com Sucesso!"];
		}


	}

?>