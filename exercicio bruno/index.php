<?php
require_once "PessoaFisica.php";

$lista = [];

// Criando objetos (instâncias)
for ($i = 0; $i < 2000; $i++) {
    $lista[$i] = new PessoaFisica();

    $lista[$i]->nome = "Ana $i";
    $lista[$i]-> idade = 20 + $i;

}

foreach ($lista as $pessoa) {
    echo $pessoa->nome . " - ". $pessoa->idade ."\n";
}