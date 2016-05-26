<?php 
	namespace Longuinho\entidades;

	/**
	  * @Entity
	  * @Table(name="CENTRO")
	  **/
	class Centro
	{	
		/**
		* @var integer @Id
		* @Column(name="id", type="integer")
		* @GeneratedValue(strategy="AUTO")
		*/
		private $id;

		/**
		*
		* @var string @Column(type="string", length=255)
		*/
		private $descricao;

		/**
		*
		* @var @Column(name="idCampus", type="integer")
		*/
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
			return $this->descricao;
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