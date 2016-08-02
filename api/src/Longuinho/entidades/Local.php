<?php 
	namespace Longuinho\entidades;

	use Longuinho\entidades\Entidade;
	/**
	  * @Entity
	  * @Table(name="LOCAL")
	  **/
	class Local extends Entidade
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
		* @OneToMany(targetEntity="Objeto", mappedBy="objeto",cascade={"persist"})
		**/
		private $objetos;


		public function __construct($id = 0, $descricao = "", $idCentro = 0)
		{
			$this->id = $id;
			$this->idCentro = $idCentro;
			$this->descricao = $descricao;
			// $this->$objetos = $objetos;
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
		public function toArray()
		{
			return [
			"id" => $this->id,
			"descricao" => $this->descricao,
			// "centro" => $this->idCentro->toArray(),
			"idCentro" => $this->idCentro->getId()
			];
		}

	}

 ?>