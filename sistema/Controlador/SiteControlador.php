<?php

namespace sistema\Controlador;

use sistema\Nucleo\Controlador;
use sistema\Modelo\PostModelo;
use sistema\Nucleo\Helpers;
use sistema\Modelo\CategoriaModelo;

class SiteControlador extends Controlador
{

    public function __construct()
    {
        parent::__construct('templates/site/views');
    }

    /**
     * Home Page
     * @return void
     */
    public function index(): void
    {
        $posts = (new PostModelo())->busca();
        
        echo $this->template->renderizar('index.html', [
            'posts' => $posts,
            'categorias' => $this->categorias(),
        ]);
    }
    
    public function buscar():void
    {
        $busca = filter_input(INPUT_POST,'busca', FILTER_DEFAULT);
        if(isset($busca)){
            $posts = (new PostModelo())->pesquisa($busca);
            
            foreach ($posts as $post){
                echo "<li class='list-group-item fw-bold'><a href=".Helpers::url('post/').$post->id.">$post->titulo</a></li>";
            }
        }
        
    }
    
    /**
     * Busca post por ID
     * @param int $id
     * @return void
     */
    public function post(int $id):void
    {
        $post = (new PostModelo())->buscaPorId($id);
        if(!$post){
            Helpers::redirecionar('404');
        }
        
        echo $this->template->renderizar('post.html', [
            'post' => $post,
            'categorias' => $this->categorias(),
        ]);
    }
    
    /**
     * Categorias
     * @return array
     */
    public function categorias(): array
    {
        return (new CategoriaModelo())->busca();
    }

    public function categoria(int $id):void
    {
        $posts = (new CategoriaModelo())->posts($id);
        
        echo $this->template->renderizar('categoria.html', [
            'posts' => $posts,
            'categorias' => $this->categorias(),
        ]);
    }
    
    /**
     * Sobre
     * @return void
     */
    public function sobre(): void
    {
        echo $this->template->renderizar('sobre.html', [
            'titulo' => 'Sobre nós'
        ]);
    }
    
    /**
     * ERRO 404
     * @return void
     */
    public function erro404(): void
    {
        echo $this->template->renderizar('404.html', [
            'titulo' => 'Página não encontrada'
        ]);
    }

}
