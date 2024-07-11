<?php

namespace sistema\Controlador;

use sistema\Nucleo\Controlador;
use sistema\Modelo\PostModelo;
use sistema\Nucleo\Helpers;
use sistema\Modelo\CategoriaModelo;
use Twig\Node\CaptureNode;

class SiteControlador extends Controlador
{

  public function __construct()
  {
    parent::__construct('templates/site/views');
  }

  public function index(): void
  {
    $posts = (new PostModelo())->busca();

    echo $this->template->renderizar('index.html', [
      'posts' => $posts,
      'categorias' => $this->categorias(),
    ]);
  }


  public function buscar(): void
  {

    $busca = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (isset($busca)) {
      $posts = (new PostModelo())->pesquisa($busca['busca']);


      echo $this->template->renderizar('busca.html', [
        'posts' => $posts,
        'categorias' => $this->categorias(),
      ]);
    }
  }

  public function post(int $id): void
  {
    $post = (new PostModelo())->buscarPorId($id);

    if (!$post) {
      Helpers::redirecionar('404');
    }
    echo $this->template->renderizar('post.html', [
      'post' => $post,
      'categorias' => $this->categorias(),

    ]);
  }

  public function categoria(int $id): void
  {
    $posts = (new CategoriaModelo())->posts($id);

    echo $this->template->renderizar('categorias.html', [
      'posts' => $posts,
      'categorias' => $this->categorias(),
    ]);
  }

  public function categorias()
  {
    return (new CategoriaModelo())->busca();
  }

  public function sobre(): void
  {
    echo $this->template->renderizar('sobre.html', [
      'titulo' => 'pagina sobre',
      'categorias' => $this->categorias(),
    ]);
  }

  public function erro404(): void
  {
    echo $this->template->renderizar('404.html', [
      'titulo' => 'Pagina não encontrada',
    ]);
  }
}
