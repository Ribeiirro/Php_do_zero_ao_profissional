<?php

namespace sistema\Controlador\Admin;

use sistema\Modelo\CategoriaModelo;

class AdminCategorias extends AdminControlador
{

  public function listar(): void
  {
    echo $this->template->renderizar('categorias/listar.html',[
      'categorias'=> (new CategoriaModelo())->busca(),
    ]);
  }

  public function cadastrar(): void
  {
    echo $this->template->renderizar('categorias/formulario.html',[]);
  }


}

?>
