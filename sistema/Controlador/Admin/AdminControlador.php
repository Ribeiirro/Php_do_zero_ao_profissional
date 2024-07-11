<?php 

namespace sistema\Controlador\Admin;

use sistema\Nucleo\Controlador;

class AdminControlador extends Controlador
{
  public function __construct()    
  {
    parent::__construct('templates/admin/views');
  }
}

?>