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
			$campus = new Campus($json->id,$json->descricao,$json->endereco);
			$this->getDAO()->insert($campus);

			return ["mensagem" => "Campus Inserido com Sucesso!"];
		}

		public function update($id,$json)
		{}
		public function delete($id)
		{}


	}

?>