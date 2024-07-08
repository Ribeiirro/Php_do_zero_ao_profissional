<?php

namespace sistema\Modelo;
use sistema\Nucleo\Conexao;

class PostModelo
{
  public function busca(int $id = null): array
  {

    $where  = ($id ? "WHERE  id = {$id}" : '');

    $query = "SELECT * FROM posts {$where} ";
    $stmt = Conexao::getInstancia()->query($query);
    $resultado = $stmt->fetchAll();

    return $resultado;
  }
}
