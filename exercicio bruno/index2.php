<?php
    require_once("Pessoa.php");
    require_once("PessoaDAO.php");

    $dao = new PessoaDAO();
    $lista = $dao->readAll();

    foreach ($lista as $pessoa) {
        echo $pessoa . "\n"; // usa
    }