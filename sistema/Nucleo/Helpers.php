<?php

namespace sistema\Nucleo;

use Exception;

class Helpers
{

  public static function redirecionar(string $url = null): void
  {
    header('HTTP/1.1 302 Found');

    $local = ($url ? self::url($url) : self::url());

    header("Location: {$local} ");

    exit();
  }

  public static function limparNumero(string $numero): string
  {
    return preg_replace("/[^0-9]/", '', $numero);
  }


  public static function validarCpf(string $cpf): bool
  {
    $cpf = self::limparNumero($cpf);

    if (mb_strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
      throw new Exception('<p class="alert alert-danger">O CPF precisa de ter 11 digitos.</p>');
    }
    for ($t = 9; $t < 11; $t++) {
      for ($d = 0, $c = 0; $c < $t; $c++) {
        $d += $cpf[$c] * (($t + 1) - $c);
      }
      $d = ((10 * $d) % 11) % 10;
      if ($cpf[$c] != $d) {
        throw new Exception('CPF Invalido');
      }
    }
    return true;
  }


  public static function saudacaoMetch(): string

  {
    $hora =  date('H');

    // $saudacao = match($hora) {
    //   '09' =>'Bom dia',
    //   '12' => 'Boa tarde'
    // };

    $saudacao = match (true) {
      $hora >= 0 and $hora <= 5 => 'Boa madrugada',
      $hora >= 6 and $hora <= 12 => 'Bom dia',
      $hora >= 13 and $hora <= 18 => 'Boa tarde',

      default => 'Boa noite'
    };
    return $saudacao;
  }

  public static function saudacaoSwitCase(): string

  /**
   * 
   * Uso do switCase para reduzir o tamanho da função passando aguntos com menor verbosidade.
   */
  {
    $hora =  date('H');
    switch ($hora) {
      case $hora >= 0 && $hora <= 5:
        $saudacao = 'Boa madrugada';
        break;
      case $hora >= 6 && $hora <= 12:
        $saudacao = 'Bom dia';
        break;
      case $hora >= 13 && $hora <= 18:
        $saudacao = '';
        break;
      default:
        $saudacao = 'Boa noite';
    };
    return $saudacao;
  }


  // function slug(string $string): string
  /**
   * Função para substituir caracters especiais, obs: Atentar-se para a ordem dos item pois se faltar a função continuará sem resover alguns erros pois ela conta a quantidade de caracteres para realizar a substituição por outro de igual equivalincia em ordem.
   */
  // {

  //   $mapa['a'] = '"#$%&()*+,-./0-9:;<=>?@A-Z[\]^_`a-z{|}~-¡¢£¤¥¦§¨©ª«¬­®¯°±²³´µ¶·¸¹º»¼½¾¿ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõö÷øùúûüýþÿŒœŠšŸˆ˜– —‘’‚“”„†‡‰‹';

  //   $mapa['b'] = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

  //   $slug = strtr(utf8_decode($string), utf8_decode($mapa['a']), $mapa['b']);

  //   return $slug;
  // }

  /**
   * 
   * Função para devolver dias, meses e ano, para formatar de acordo com nossa vontade.
   * @param string, Separação de elemento a elemento
   * @return void, devolvendo os dados de acordo com a formatação escolhida.
   */
  public static function dataAtual(): string
  {
    $diaMes = date('d');
    $diaSemana = date('w');
    $mes = date('n') - 1;
    $ano = date('Y');

    $nomesDiasDaSemana = [
      'Domingo',
      'Segunda - Feira',
      'Terça - Feira',
      'Quarta - Feira',
      'Quinta - Feira',
      'Sexta - Feira',
      'Sábado'
    ];

    $mesesDoAno = [
      'Janeiro',
      'Feveiro',
      'Março',
      'Abril',
      'Maio',
      'Junho',
      'Julho',
      'Agosto',
      'Setembro',
      'Outubro',
      'Novembro',
      'Dezembro'
    ];

    $dataFormatada = $nomesDiasDaSemana[$diaSemana] . ', ' . $diaMes . ' de ' . $mesesDoAno[$mes] . ' de ' . $ano;

    return $dataFormatada;
  }


  /**
   * Montar uma url deacordo com o ambiente;
   * @param string $url parte da url ex. admin
   * @return string url completa.
   */

  public static function url(string $url = null): string
  {
    $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');

    $ambiente = ($servidor == 'localhost' ? URL_DESENVOLVIMENTO : URL_PRODUCAO);

    if (str_starts_with($url, '/')) {
      return $ambiente . $url;
    }

    return $ambiente . '/' . $url;
  }

  public static function localhost(): bool
  {
    $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');

    if ($servidor ==  'localhost') {
      return true;
    } else {
      return false;
    }
  }


  /**
   * 
   * Validar url
   * 
   * @param string $url
   * @return bool
   */

  public static function validarUrlPropia(string $url): bool
  {
    if (mb_strlen($url) > 10) {
      return false;
    }

    if (!str_contains($url, '.')) {
      return false;
    }

    if (str_contains($url, 'http://') || str_contains($url, 'https://')) {
      return true;
    }

    return false;
  }

  public static function validarUrl(string $url): bool
  {
    return filter_var($url, FILTER_VALIDATE_URL);
  }

  public static function validarEmail(string $email): bool
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  /**
   * 
   * Função contar tempo, contar o tempo decorrido de uma data
   * 
   * @param string $data
   * @return string
   */

  public static function contarTempo(string $data): string
  {
    $agora = strtotime(date('Y-m-d H:i:s'));
    $tempo = strtotime($data);
    $diferenca = $agora - $tempo;


    $segundos = $diferenca;
    $minutos = round($diferenca / 60);
    $horas = round($diferenca / 3600);
    $dias = round($diferenca / 86400);
    $semanas = round($diferenca / 604800);
    $meses = round($diferenca / 2419200);
    $anos = round($diferenca / 29030400);

    if ($segundos <= 60) {
      return 'Agora';
    } elseif ($minutos <= 60) {
      return $minutos == 1 ? 'Há um minuto' : 'Há ' . $minutos . ' minutos';
    } elseif ($horas <= 24) {
      return $horas == 1 ? 'Há 1 hora' : 'Há ' . $horas . ' horas';
    } elseif ($dias <= 7) {
      return $dias == 1 ? 'ontem' : 'Há ' . $dias . ' dias';
    } elseif ($semanas <= 4) {
      return $semanas == 1 ? 'Há 1 semana' : 'Há ' . $semanas . ' semanas';
    } elseif ($meses <= 12) {
      return $meses == 1 ? 'Há um minuto' : 'Há ' . $meses . ' meses';
    } else {
      return $anos == 1 ? 'Há 1 ano' : 'Há ' . $anos . ' anos';
    }

    // echo 'vai contando 😒';
  }

  public static function formatarValor(float $valor = null): string
  {
    return number_format(($valor ? $valor : 0), 2, ',', '.');
  }

  public static function formatarNumero(string $numero = null): string
  {
    return number_format($numero ? $numero : 0, 0, ',', '.');
  }

  public static function saudacao(): string
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

  public static function resumirTexto(string $texto, int $limite, string $continue = '...'): string
  {
    $textoLimpo = trim(strip_tags($texto));
    //se a quantidade de caracteres for menor que o limite retorne o limite
    if (mb_strlen($textoLimpo) <= $limite) {
      return $textoLimpo;
    }

    $resumirTexto = mb_substr($textoLimpo, 0, mb_strrpos(mb_substr($textoLimpo, 0, $limite), ''));
    return $resumirTexto . $continue;
  }
}
