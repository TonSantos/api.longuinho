<?php 
	namespace Longuinho\entidades;

	/**
	  * @Entity
	  * @Table(name="LOCAL")
	  **/
	class Local
	{	
		/**
		* @var integer @Id
		* @Column(name="id", type="integer")
		* @GeneratedValue(strategy="AUTO")
		*/
		private $id;


		/**
		 * @ManyToOne(targetEntity="Centro")
		 * @JoinColumn(name="idCentro", referencedColumnName="id")
		 */
		private $idCentro;

		/**
		*
		* @var string @Column(type="string", length=255)
		*/
		private $descricao;

		/**
		* @OneToMany(targetEntity="Objeto", mappedBy="objeto",cascade={"persist","remove"})
		**/
		private $objetos;


		public function __construct($id = 0, $idCentro = 0, $descricao = "", $objetos = array())
		{
			$this->id = $id;
			$this->idCentro = $idCentro;
			$this->descricao = $descricao;
			$this->$objetos = $objetos;
		}

		public function getId()
		{
			return $this->id;
		}
		public function setId($id)
		{
			$this->id = $id;
		}

		public function getIdCentro()
		{
			return $this->idCentro;
		}
		public function setIdCentro($idCentro)
		{
			$this->idCentro = $idCentro;
		}

		public function getDescricao()
		{
			return $this->descricao;
		}
		public function setDescricao($descricao)
		{
			$this->descricao = $descricao;
		}
		
		public function getObjetos()
		{
			return $this->objetos;
		}
		public function setObjetos($objetos)
		{
			$this->objetos = $objetos;
		}

	}

 ?>