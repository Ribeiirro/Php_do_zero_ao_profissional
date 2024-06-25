<?php

require_once 'sistema/configuracao.php';
include_once 'sistema/Nucleo/Helpers.php';
include 'sistema/Nucleo/Mesagem.php';
include 'sistema/Nucleo/Controlador.php';

use sistema\Nucleo\Controlador;

$controlador = new Controlador('admin');
echo '<br>';
var_dump($controlador);