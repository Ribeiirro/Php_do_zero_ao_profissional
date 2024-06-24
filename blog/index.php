
<?php

//declare(strict_types = 1); //Função obriga o php a usar o tipo de dado especifico sem realizar nenhuma alteração do tipo de dado.
require_once 'sistema/configuracao.php';
require_once 'Helpers.php';

//var_dump(validarEmail('email@email.com'));
// if(validarEmail('teste')){
// echo 'Email valido';
// }else{

// echo 'Email invalido'; 
// }

if (validarUrl('teste')) {
  echo 'Url valida';
} else {

  echo 'Url invalida';
}
