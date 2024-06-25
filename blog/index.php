
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<?php

require_once 'sistema/configuracao.php';
include_once 'Helpers.php';
include 'sistema/Nucleo/Mesagem.php';

$msg = new Mensagem();
echo '<br>';
echo $msg->sucesso('Mensagem chama por outro metodo')->renderizar();
echo $msg->error('Mensagem chama por outro metodo')->renderizar();
echo $msg->warning('Mensagem chama por outro metodo')->renderizar();
echo $msg->info('Mensagem chama por outro metodo')->renderizar();
echo '<br>';
var_dump($msg);
echo '<br>';
