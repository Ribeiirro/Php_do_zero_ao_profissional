
<?php

require_once 'sistema/configuracao.php';
include_once 'Helpers.php';
include 'sistema/Nucleo/Mesagem.php';

$msg = new Mensagem();

echo $msg->texto = 'Novo valor';
var_dump($msg);
