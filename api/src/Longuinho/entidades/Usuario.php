<?php 
	namespace Longuinho\entidades;

	class Usuario
	{	
		private $id;
		private $nome;
		private $email;
		private $matricula;
		private $telefone;

		public function __construct($id = 0, $nome = "", $email = "", $matricula = "", $telefone = "")
		{
			$this->id = $id;
			$this->nome = $nome;
			$this->email = $email;
			$this->matricula = $matricula;
			$this->telefone = $telefone;

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


	}

 ?>