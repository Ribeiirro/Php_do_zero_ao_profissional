<?php

namespace sistema\Suporte;

use Twig\Lexer;
use sistema\Nucleo\Helpers;

class Template
{
  private \Twig\Environment $twig;

  public function __construct(string $diretorio)
  {
    $loader = new \Twig\Loader\FilesystemLoader($diretorio);

    $this->twig = new \Twig\Environment($loader);

    $lexer = new Lexer($this->twig, array(
      $this->helpers()
    ));

    $this->twig->setLexer($lexer);
  }

  public function renderizar(string $view, array $dados): string
  {
    return $this->twig->render($view, $dados);
  }

  private function helpers(): void
  {
    array(
      $this->twig->addFunction(
        new \Twig\TwigFunction('url', function (string $url = null) {
          return Helpers::url($url);
        })
      ),

      $this->twig->addFunction(
        new \Twig\TwigFunction('saudacao', function(){
          return Helpers::saudacao();
        })
      ),
    );
  }
}
