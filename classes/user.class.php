<?php
//incluo a classe de modelo;
require_once 'modelo.class.php';

//crio minha classe filho do meu modelo;

class user extends modelo{
	
	//defino a tabela e suas colunas;

	protected $table = 'user';
	private $nome_user;
	private $login_user;
	private $senha_user;
	private $setor_user;

	//seto as colunas para armazenar durante a programação;

	public function setNome_user($nome_user){
		$this->nome_user = $nome_user;
	}

	public function setLogin_user($login_user){
	$this->login_user = $login_user;
	}

	public function setSenha_user($senha_user){
	$this->senha_user = $senha_user;
	}

	public function setSetor_user($setor_user){
	$this->setor_user = $setor_user;
	}

	//uso as funções abstrata;

	public function create(){

		$sql  = "INSERT INTO $this->table (nome_user, login_user, senha_user, setor_user) VALUES (:nome_user, :login_user, :senha_user, :setor_user)";
		$stmt = db::prepare($sql);
		$stmt->bindParam(':nome_user', $this->nome_user, PDO::PARAM_STR);
		$stmt->bindParam(':login_user', $this->login_user, PDO::PARAM_STR);
		$stmt->bindParam(':senha_user', $this->senha_user, PDO::PARAM_STR);
		$stmt->bindParam(':setor_user', $this->setor_user, PDO::PARAM_STR);
		return $stmt->execute();

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET senha_user = :senha_user WHERE userid = :userid";
		$stmt = db::prepare($sql);
		$stmt->bindParam(':senha_user', $this->senha_user, PDO::PARAM_STR);
		$stmt->bindParam(':userid', $id, PDO::PARAM_INT);
		return $stmt->execute();

	}

}