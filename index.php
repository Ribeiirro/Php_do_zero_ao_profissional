<?php

//Arquivo index responsável pela inicialização do sistema
require 'vendor/autoload.php';

// require'rotas.php';

$dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);
if (isset ($dados)) {
  echo $dados['nome'];
  echo $dados['senhas'];
}

?>

<form method="get">


<input type="text" name="nome" id="">
<input type="text" name="senha" id="">

<button type="submit">Submit</button>

</form>
