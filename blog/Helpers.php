<?php

function contarTempo(string $data)
{
  $agora = strtotime(date('Y-m-d H:i:s'));
  $tempo = strtotime($data);
  echo $diferenca = $agora - $tempo;

  echo'<br>';
  var_dump($data, $tempo, $diferenca);
}

function formatarValor(float $valor = null): string
{
  return number_format(($valor ? $valor : 0), 2, ',', '.');
}

function formatarNumero(string $numero = null): string
{
  return number_format($numero ? $numero : 0, 0, ',', '.');
}

function saudacao(): string
{

  $hora = date('H');

  if ($hora >= 0 && $hora <= 5) {
    $saudacao = 'Boa madrugada';
  } elseif ($hora >= 6 && $hora <= 12) {
    $saudacao = 'Bom dia';
  } elseif ($hora >= 13 && $hora <= 18) {
    $saudacao = 'Boa tarde';
  } else {
    $saudacao = 'Boa noite';
  }
  return $saudacao;
}

/**
 * 
 * Resume um texto, 
 * 
 * @param string $texto para resumir
 * @param int $limite, quantidade de caracteres que irá resumir.
 * @param string $continue, parametro opcional par mostrar o que deve ser inserido no final da frase
 * @return string texto resumido
 * 
 */

function resumirText(string $texto, int $limite, string $continue = '...'): string
{
  $textoLimpo = trim(strip_tags($texto));
  //se a quantidade de caracteres for menor que o limite retorne o limite
  if (mb_strlen($textoLimpo) <= $limite) {
    return $textoLimpo;
  }

  $resumirTexto = mb_substr($textoLimpo, 0, mb_strrpos(mb_substr($textoLimpo, 0, $limite), ''));
  return $resumirTexto . $continue;
}
