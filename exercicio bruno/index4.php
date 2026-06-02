<?php
    require_once("Pessoa.php");
    require_once("PessoaDAO.php");

    $dao = new PessoaDAO();
    $pessoas = $dao->delete(4);

        echo $pessoas . "\n"; // usa