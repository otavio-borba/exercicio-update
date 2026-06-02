<?php
    require_once "Pessoa.php";
    require_once "PessoaDAO.php";

    $pess = new Pessoa(
        "Beatriz",
        "03177722243",
        "enzo@gmail.com",
        39,
        1,
    );

    $atualizapessoa = new PessoaDAO();
    $atualizapessoa->update($pess);

    $consultaPessoa = new PessoaDAO();
    echo "\nConsulta pelo id " , $consultaPessoa->read(1); 
