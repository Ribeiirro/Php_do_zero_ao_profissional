<?php

use Pecee\SimpleRouter\SimpleRouter;
use sistema\Controlador\Admin\AdminDashboard;
use sistema\Nucleo\Helpers;

try {

  SimpleRouter::setDefaultNamespace("sistema\Controlador");

  SimpleRouter::get(URL_SITE, 'SiteControlador@index');
  SimpleRouter::get(URL_SITE . 'sobre', 'SiteControlador@sobre');
  SimpleRouter::get(URL_SITE . 'post/{id}', 'SiteControlador@post');
  SimpleRouter::get(URL_SITE . 'categoria/{id}', 'SiteControlador@categoria');
  SimpleRouter::post(URL_SITE . 'buscar', 'SiteControlador@buscar');

  SimpleRouter::get(URL_SITE. '404', 'SiteControlador@erro404');

  SimpleRouter::group(['namespace' => 'Admin'], function () {
    SimpleRouter::get(URL_ADMIN.'dashboard', 'AdminDashboard@dashboard');

    //Admin posts
    SimpleRouter::get(URL_ADMIN.'posts/listar', 'AdminPosts@listar');
    SimpleRouter::match(['get','post'], URL_ADMIN.'posts/cadastrar','AdminPosts@cadastrar');

    //Admin categorias
    SimpleRouter::get(URL_ADMIN.'categorias/listar', 'AdminCategorias@listar');
    SimpleRouter::match(['get','post'], URL_ADMIN.'categorias/cadastrar','AdminCategorias@cadastrar');
});

  SimpleRouter::start();
} catch (Pecee\SimpleRouter\Exceptions\NotFoundHttpException $e) {

  if(Helpers::localhost()){
    echo''. $e->getMessage() .'';
  } else {
    Helpers::redirecionar('404');
  }
}
