<?php 
	namespace Longuinho\entidades;

	class Campus
	{	
		private $id;
		private $descricao;
		private $endereco;

		public function __construct($id = 0, $descricao = "", $endereco = "")
		{
			$this->id = $id;
			$this->descricao = $descricao;
			$this->endereco = $endereco;
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

		public function getEndereco()
		{
			return $this->endereco;
		}
		public function setEnderco($endereco)
		{
			$this->endereco = $endereco;
		}

		


	}

 ?>