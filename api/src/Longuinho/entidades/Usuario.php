<?php 
	namespace Longuinho\entidades;

	use Longuinho\entidades\Entidade;

	/**
	  * @Entity
	  * @Table(name="USUARIO")
	  **/
	class Usuario extends Entidade
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
		private $nome;

		/**
		*
		* @var string @Column(type="string", length=255)
		*/
		private $email;

		/**
		*
		* @var string @Column(type="string", length=255)
		*/
		private $matricula;

		/**
		*
		* @var string @Column(type="string", length=255)
		*/
		private $telefone;

		/**
		* @OneToMany(targetEntity="Objeto", mappedBy="objeto",cascade={"persist"})
		**/
		private $objetos;

		public function __construct($id = 0, $nome = "", $email = "", $matricula = "", $telefone = "")
		{
			$this->id = $id;
			$this->nome = $nome;
			$this->email = $email;
			$this->matricula = $matricula;
			$this->telefone = $telefone;
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

		public function getNome()
		{
			return $this->nome;
		}
		public function setNome($nome)
		{
			$this->nome = $nome;
		}

		public function getEmail()
		{
			return $this->email;
		}
		public function setEmail($email)
		{
			$this->email = $email;
		}

		public function getMatricula()
		{
			return $this->matricula;
		}
		public function setMatricula($matricula)
		{
			$this->matricula = $matricula;
		}

		public function getTelefone()
		{
			return $this->telefone;
		}
		public function setTelefone($telefone)
		{
			$this->telefone = $telefone;
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
			"nome" => $this->nome,
			"email" => $this->email,
			"matricula" => $this->matricula,
			"telefone" => $this->telefone
			];
		}


	}

 ?>