<?php
class Pessoa
{
  private $nome;
  private $cpf;
  private $email;
  private $idade;
  private $id;

  public function __construct($nome, $cpf, $email, $idade, $id = null)
  {
    $this->setNome($nome);
    $this->setCpf($cpf);
    $this->setEmail($email);
    $this->setIdade($idade);
    $this->setId($id);
  }

  public function getNome()
  {
    return $this->nome;
  }
  public function getCpf()
  {
    return $this->cpf;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function getIdade()
  {
    return $this->idade;
  }
  public function getId()
  {
    return $this->id;
  }

  public function setNome($n)
  {
    $this->nome = trim($n);
  }
  public function setId($id)
  {
    $this->id = $id;
  }

  public function setCpf($c)
  {
    $this->cpf = $c;
  }

  public function setEmail($e)
  {
    if (!filter_var($e, FILTER_VALIDATE_EMAIL))
      throw new Exception("Email inválido");
    $this->email = $e;
  }

  public function setIdade($i)
  {
    $this->idade = max(0, (int) $i);
  }

  public function __toString()
  {
    return "{$this->nome} - {$this->cpf} - {$this->email} — {$this->idade} anos";
  }
}