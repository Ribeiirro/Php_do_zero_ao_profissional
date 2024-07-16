<?php

namespace sistema\Controlador\Admin;

use sistema\Modelo\CategoriaModelo;
use sistema\Nucleo\Helpers;

/**
 * Classe AdminCategorias
 *
 * @author Ronaldo Aires
 */
class AdminCategorias extends AdminControlador
{
    public function listar():void
    {
        echo $this->template->renderizar('categorias/listar.html', [
            'categorias' => (new CategoriaModelo())->busca()
        ]);
    }
    
     public function cadastrar():void
    {
         $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
         if(isset($dados)){
             (new CategoriaModelo())->armazenar($dados);
             Helpers::redirecionar('admin/categorias/listar');
         }
         
        echo $this->template->renderizar('categorias/formulario.html', []);
    }
    
     public function editar(int $id):void
    {
        $categoria = (new CategoriaModelo())->buscaPorId($id);
        
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
         if(isset($dados)){
             
             Helpers::redirecionar('admin/categorias/listar');
         }
        
        echo $this->template->renderizar('categorias/formulario.html', [
            'categoria' => $categoria
        ]);
    }
}
