<?php

namespace sistema\Controlador;

use sistema\Nucleo\Controlador;
use sistema\Modelo\PostModelo;
  
class SiteControlador extends Controlador
{

  public function __construct()
  {
    parent::__construct('templates/site/views');
  }

  public function index(): void
  {
    $posts = (new PostModelo())->ler();

    echo $this->template->renderizar('index.html', [
      'posts' => $posts,
    ]);
  }

  public function post(int $id): void
  {
    echo $id;
  }

  public function sobre(): void
  {
    echo $this->template->renderizar('sobre.html', [
      'titulo' => 'pagina sobre',
    ]);
  }

  public function erro404(): void
  {
    echo $this->template->renderizar('404.html', [
      'titulo' => 'Pagina não encontrada',
    ]);
  }
}
