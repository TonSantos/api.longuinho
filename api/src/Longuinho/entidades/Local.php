<?php 
	namespace Longuinho\entidades;

	class Local
	{	
		private $id;
		private $idCampus;
		private $idCentro;

		public function __construct($id = 0, $idCampus = 0, $idCentro = 0)
		{
			$this->id = $id;
			$this->idCampus = $idCampus;
			$this->idCentro = $idCentro;
		}

		public function getId()
		{
			return $this->id;
		}
		public function setId($id)
		{
			$this->id = $id;
		}

		public function getIdCampus()
		{
			return $this->idCampus;
		}
		public function setIdCampus($idCampus)
		{
			$this->idCampus = $idCampus;
		}

		public function getIdCentro()
		{
			return $this->idCentro;
		}
		public function setIdCentro($idCentro)
		{
			$this->idCentro = $idCentro;
		}

		


	}

 ?>