
<?php

require_once 'sistema/configuracao.php';
require_once 'Helpers.php';

echo 'Ola,{{userName}} 👋'.' '.saudacao().', '.'Hoje é: '. ' '.dataAtual().' , '.'Agora é: '.' '.date('H:i').'.';
