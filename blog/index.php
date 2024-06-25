
<?php

require_once 'sistema/configuracao.php';
include_once 'Helpers.php';
include 'sistema/Nucleo/Mesagem.php';

$msg = new Mensagem();
echo '<br>';
echo $msg->renderizar();
echo '<br>';
var_dump($msg);
echo '<br>';
