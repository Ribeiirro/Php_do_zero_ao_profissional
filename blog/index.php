<?php

require_once 'sistema/configuracao.php';
include_once 'sistema/Nucleo/Helpers.php';
include 'sistema/Nucleo/Mesagem.php';

use sistema\Nucleo\Helpers;

// $helper = new Helpers();
// echo '<br>';
// echo $helper->validarCpf('12345678901');
// echo '<br>';
echo Helpers::limparNumero('kjflsdkfkajo7894739274824620hjknfksnkf');