
<?php

require_once 'sistema/configuracao.php';
require_once 'Helpers.php';

// for($baseCalc = 0; $baseCalc <= 10; $baseCalc++);
// $numero = $baseCalc++;

// while($numero<10){
//   echo $numero++;
// };

// for($i = 0; $i <= 10; $i++){
  // echo $i;
  // echo($i % 2 ? $i.' Impar ':$i.' Par ') .'<br>';
  // echo $i. ' x '.$baseCalc.' = '.$i*$baseCalc.'<br>';
// }

// Validar CPF

$cpf = '07337998335';

var_dump(validarCpf($cpf)); 

// echo $limparNumero = preg_replace("/[^0-9]/",'', $cpf);

// for ($t = 9; $t < 11; $t++) {
//   for ($d = 0, $c = 0; $c < $t; $c++) {
//     $d += $cpf[$c] * (($t + 1) - $c);
//   }
//   $d = ((10 * $d) % 11) % 10;
//   if($cpf[$c] != $d) {
//     echo 'CPF Invalido';
//   }else {
//     echo 'CPF Valido';
//   }
// }
