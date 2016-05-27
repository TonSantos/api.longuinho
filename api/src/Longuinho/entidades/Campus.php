<?php 
	namespace Longuinho\entidades;

	/**
	  * @Entity
	  * @Table(name="CAMPUS")
	  **/
	class Campus
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
		* @var string @Column(type="string", length=255)
		*/
		private $endereco;

		/**
		* @OneToMany(targetEntity="Centro", mappedBy="centro",cascade={"persist","remove"})
		**/
		private $centros;

		public function __construct($id = 0, $descricao = "", $endereco = "", $centros = array())
		{
			$this->id = $id;
			$this->descricao = $descricao;
			$this->endereco = $endereco;
			$this->centros = $centros;
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

		public function getEndereco()
		{
			return $this->endereco;
		}
		public function setEnderco($endereco)
		{
			$this->endereco = $endereco;
		}

		public function getCentros()
		{
			return $this->centros;
		}
		public function setCentros($centros)
		{
			$this->centros = $centros;
		}
		


	}

 ?>