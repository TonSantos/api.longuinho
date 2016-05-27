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
		 * @ManyToOne(targetEntity="Campus",cascade={"persist"})
		 * @JoinColumn(name="idCampus", referencedColumnName="id")
		 */
		private $idCampus;


		/**
		* @OneToMany(targetEntity="Local", mappedBy="local",cascade={"persist","remove"})
		**/
		private $locais;

		public function __construct($id = 0, $descricao = "", $idCampus = 0, $locais = array())
		{
			$this->id = $id;
			$this->descricao = $descricao;
			$this->idCampus = $idCampus;
			$this->locais = $locais;
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

		public function getLocais()
		{
			return $this->locais;
		}
		public function setLocais($locais)
		{
			$this->locais = $locais;
		}
		


	}

 ?>