<?php
//incluo a classe de modelo;
require_once 'modelo.class.php';

//crio minha classe filho do meu modelo;

class chamado extends modelo{
	
	//defino a tabela e suas colunas;

	protected $table = 'chamado';
	private $titulo_chamado;
	private $prioridade_chamado;
	private $descricao_chamado;
	private $anexo_chamado;
	private $status_chamado;
	private $userid;

	//seto as colunas para armazenar durante a programação;

	public function setTitulo_chamado($titulo_chamado){
		$this->titulo_chamado = $titulo_chamado;
	}

	public function setPrioridade_chamado($prioridade_chamado){
	$this->prioridade_chamado = $prioridade_chamado;
	}

	public function setDescricao_chamado($descricao_chamado){
	$this->descricao_chamado = $descricao_chamado;
	}

	public function setAnexo_chamado($anexo_chamado){
	$this->anexo_chamado = $anexo_chamado;
	}

	public function setStatus_chamado($status_chamado){
	$this->status_chamado = $status_chamado;
	}

	public function setUserid($userid){
	$this->userid = $userid;
	}

	//uso as funções abstrata;

	public function create(){

		$sql  = "INSERT INTO $this->table (titulo_chamado, prioridade_chamado, descricao_chamado, anexo_chamado, status_chamado, data_chamado, userid) VALUES (:titulo_chamado, :prioridade_chamado, :descricao_chamado, :anexo_chamado, :status_chamado, :data_chamado, :userid)";
		$stmt = db::prepare($sql);
		$stmt->bindParam(':titulo_chamado', $this->titulo_chamado, PDO::PARAM_STR);
		$stmt->bindParam(':prioridade_chamado', $this->prioridade_chamado, PDO::PARAM_INT);
		$stmt->bindParam(':descricao_chamado', $this->descricao_chamado, PDO::PARAM_STR);
		$stmt->bindParam(':anexo_chamado', $this->anexo_chamado, PDO::PARAM_STR);
		$stmt->bindParam(':status_chamado', $this->status_chamado, PDO::PARAM_STR);
		$stmt->bindParam(':data_chamado', date('d/m/Y'), PDO::PARAM_STR);
		$stmt->bindParam(':userid', $this->userid, PDO::PARAM_INT);
		return $stmt->execute();

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET status_chamado = :status_chamado WHERE chamadoid = :chamadoid";
		$stmt = db::prepare($sql);
		$stmt->bindParam(':status_chamado', $this->status_chamado, PDO::PARAM_STR);
		$stmt->bindParam(':chamadoid', $id, PDO::PARAM_INT);
		return $stmt->execute();

	}

	public function delete($id){

		$sql  = "DELETE FROM $this->table WHERE chamadoid = :chamadoid";
		$stmt = db::prepare($sql);
		$stmt->bindParam(':chamadoid', $id, PDO::PARAM_INT);
		return $stmt->execute();

	}

}