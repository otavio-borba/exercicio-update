<?php

require_once("Conexao.php");

class PessoaDAO
{
  private $conn;

  public function __construct()
  {
    $this->conn = Conexao::getConexao();
  }

  public function create(Pessoa $p)
  {
    $sql = "INSERT INTO pessoas (nome, cpf, email, idade) VALUES (?, ?, ?, ?)";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([$p->getNome(), $p->getCpf(), $p->getEmail(), $p->getIdade()]);
    $p->setId($this->conn->lastInsertId());

    return $p;
  }

  public function read($id)
  {
    $sql = "SELECT * FROM pessoas WHERE id = ?";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$dados)
      return null;
    $p = new Pessoa($dados['nome'], $dados['cpf'], $dados['email'], $dados['idade']);
    $p->setId($dados['id']);

    return $p;
  }

  public function readAll()
  {
    $sql = "SELECT * FROM pessoas ORDER BY nome";
    $stmt = $this->conn->query($sql);
    $pessoas = [];

    while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $p = new Pessoa(
        $dados['nome'],
        $dados['cpf'],
        $dados['email'],
        $dados['idade'],
        $dados['id']
      );
      $p->setId($dados['id']);
      $pessoas[] = $p;
    }
    return $pessoas;
  }
  public function delete($id)
  {
    $sql = "DELETE FROM pessoas WHERE id = ?";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);
    return "Deletado com sucesso";
  }
  public function update(Pessoa $p)
  {
    $sql = "UPDATE pessoas SET nome = ?, cpf = ?, email = ?, idade = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$p->getNome(), $p->getCpf(), $p->getEmail(), $p->getIdade(), $p->getId()]);
    return "Atualizado com sucesso";
  }
}