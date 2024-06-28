<?php

//Arquivo index responsável pela inicialização do sistema
require 'vendor/autoload.php';
// require 'rotas.php';

use sistema\Nucleo\Conexao;

$con = Conexao::getInstancia();