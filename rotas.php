<?php

use Pecee\SimpleRouter\SimpleRouter;
use sistema\Nucleo\Helpers;

try {

  SimpleRouter::setDefaultNamespace("sistema\Controlador");

  SimpleRouter::get(URL_SITE, 'SiteControlador@index');
  SimpleRouter::get(URL_SITE . 'sobre', 'SiteControlador@sobre');
  SimpleRouter::get(URL_SITE . 'post/{id}', 'SiteControlador@post');
  SimpleRouter::get(URL_SITE . 'categoria/{id}', 'SiteControlador@categoria');
  SimpleRouter::post(URL_SITE . 'buscar', 'SiteControlador@buscar');
  SimpleRouter::get(URL_SITE. '404', 'SiteControlador@erro404');

  SimpleRouter::start();
} catch (Pecee\SimpleRouter\Exceptions\NotFoundHttpException $e) {

  if(Helpers::localhost()){
    echo''. $e->getMessage() .'';
  } else {
    Helpers::redirecionar('404');
  }
}
