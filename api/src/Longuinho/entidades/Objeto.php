<?php 
	namespace Longuinho\entidades;
	use Longuinho\entidades\Entidade;
	/**
	  * @Entity
	  * @Table(name="OBJETO")
	  **/
	class Objeto extends Entidade
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
		* @var text @Column(type="text")
		*/
		private $descricao;

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
		 * @ManyToOne(targetEntity="Categoria")
		 * @JoinColumn(name="idCategoria", referencedColumnName="id")
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

		public function __construct($id = 0, $titulo = "", $descricao ="", $classificacao = "", $idLocal = 0, $idCategoria = 0, $horario = "0000-00-00 00:00:00", $status=0, $idUsuario = 0)
		{
			$this->id = $id;
			$this->titulo = $titulo;
			$this->descricao = $descricao;
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
		public function getDescricao()
		{
			return $this->descricao;
		}
		public function setDescricao($descricao)
		{
			$this->descricao = $descricao;
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
		public function toArray()
		{
			return [
			"id" => $this->id,
			"titulo" => $this->titulo,
			"descricao" => $this->descricao,
			"classificacao" => $this->classificacao,
			// "local" => $this->idLocal->toArray(),
			"idLocal" => $this->idLocal->getId(),
			// "categoria" => $this->idCategoria->toArray(),
			"idCategoria" => $this->idCategoria->getId(),
			"horario" => $this->horario,
			"status" => $this->status,
			// "usuario" => $this->idUsuario->toArray(),
			"idUsuario" => $this->idUsuario->getId()
			];
		}

	}

 ?>