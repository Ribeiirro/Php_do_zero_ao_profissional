<?php 

namespace sistema\Controlador;

use sistema\Nucleo\Controlador;

class SiteControlador extends Controlador
{
  
  public function __construct() {
    parent::__construct('templates/site/views');
  }

  public function index(): void
  {
    echo $this->template->renderizar('index.html',[
      'titulo' => 'Teste de titulo 0',
      'titulo1' => 'Teste de titulo 1',
      'titulo2' => 'Teste de titulo 2',
      'titulo3' => 'Teste de titulo 3',
      'titulo4' => 'Teste de titulo 4',
    ]);
  }

  public function sobre(): void 
    {
      echo 'pagina sobre';
    }

}