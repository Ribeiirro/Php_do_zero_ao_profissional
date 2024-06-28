<?php 

namespace sistema\Nucleo;

use PDO;
use PDOException;

class Conexao 
{
  private static $instancia;

  public static function getInstancia():PDO
  {
    if (empty(self::$instancia)) 
    {
      try{
        self::$instancia = new PDO('mysql:host=localhost;dbname=blog','root','');
      }
      catch(PDOException $e){
        die('Erro de conexão:: '. $e->getMessage());
      }
    }
    return self::$instancia;
  }
}