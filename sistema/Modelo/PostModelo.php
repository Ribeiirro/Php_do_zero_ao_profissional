<?php

namespace sistema\Modelo;

use sistema\Nucleo\Conexao;

class PostModelo
{
  public function busca(): array
  {
    $query = "SELECT * FROM posts ";
    $stmt = Conexao::getInstancia()->query($query);
    $resultado = $stmt->fetchAll();

    return $resultado;
  }

  public function buscarPorId(int $id): bool | object
  {
    $query = "SELECT * FROM posts WHERE id ={$id} ";
    $stmt = Conexao::getInstancia()->query($query);
    $resultado = $stmt->fetch();

    return $resultado;
  }
}
