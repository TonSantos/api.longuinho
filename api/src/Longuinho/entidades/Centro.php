<?php 
	namespace Longuinho\entidades;

	class Centro
	{	
		private $id;
		private $descricao;
		private $idCampus;

		public function __construct($id = 0, $descricao = "", $idCampus = 0)
		{
			$this->id = $id;
			$this->descricao = $descricao;
			$this->idCampus = $idCampus;
		}

		public function getId()
		{
			return $this->id;
		}
		public function setId($id)
		{
			$this->id = $id;
		}

		public function getDescricao()
		{
			return $this->descricao
		}
		public function setDescricao($descricao)
		{
			$this->descricao = $descricao;
		}

		public function getIdCampus()
		{
			return $this->idCampus;
		}
		public function setIdCampus($idCampus)
		{
			$this->idCampus = $idCampus;
		}

		


	}

 ?>