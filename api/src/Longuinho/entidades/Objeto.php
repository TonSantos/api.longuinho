<?php 
	namespace Longuinho\entidades;

	/**
	  * @Entity
	  * @Table(name="OBJETO")
	  **/
	class Objeto
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
		private $titulo;

		/**
		*
		* @var string @Column(type="string", length=255)
		*/
		private $classificacao;

		/**
		 * @ManyToOne(targetEntity="Local")
		 * @JoinColumn(name="idLocal", referencedColumnName="id")
		 */
		private $idLocal;

		/**
		*
		* @var @Column(name="idCategoria", type="integer")
		*/
		private $idCategoria;

		/**
		*
		* @var string @Column(type="datetime")
		*/
		private $horario;

		/**
		*
		* @var @Column(name="status", type="integer")
		*/
		private $status;

		/**
		 * @ManyToOne(targetEntity="Usuario")
		 * @JoinColumn(name="idUsuario", referencedColumnName="id")
		 */
		private $idUsuario;

		public function __construct($id = 0, $titulo = "", $classificacao = "", $idLocal = 0, $idCategoria = 0, $horario = "0000-00-00 00:00:00", $status=0, $idUsuario = 0)
		{
			$this->id = $id;
			$this->titulo = $titulo;
			$this->classificacao = $classificacao;
			$this->idLocal = $idLocal;
			$this->idCategoria = $idCategoria;
			$this->horario = $horario;
			$this->status = $status;
			$this->idUsuario = $idUsuario;
		}

		public function getId()
		{
			return $this->id;
		}
		public function setId($id)
		{
			$this->id = $id;
		}

		public function getTitulo()
		{
			return $this->titulo;
		}
		public function setTitulo($titulo)
		{
			$this->titulo = $titulo;
		}

		public function getClassificacao()
		{
			return $this->classificacao;
		}
		public function setClassificacao($classificacao)
		{
			$this->classificacao = $classificacao;
		}

		public function getIdLocal()
		{
			return $this->idLocal;
		}
		public function setIdLocal($idLocal)
		{
			$this->idLocal = $idLocal;
		}

		public function getIdCategoria()
		{
			return $this->idCategoria;
		}
		public function setIdCategoria($idCategoria)
		{
			$this->idCategoria = $idCategoria;
		}

		public function getHorario()
		{
			return $this->horario;
		}
		public function setHorario($horario)
		{
			$this->horario = $horario;
		}

		public function getStatus()
		{
			return $this->status;
		}
		public function setStatus()
		{
			if($this->getStatus() == 0):

				$this->status = 1;
			else:
				$this->status = 0;

			endif;
			
		}
		public function getIdUsuario()
		{
			return $this->idUsuario;
		}
		public function setIdUsuario($idUsuario)
		{
			$this->idUsuario = $idUsuario;
		}


	}

 ?>