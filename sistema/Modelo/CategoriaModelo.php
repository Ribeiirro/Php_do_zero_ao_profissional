<?php

namespace sistema\Modelo;

use sistema\Nucleo\Conexao;

class CategoriaModelo
{
  public function busca(): array
  {
    $query = "SELECT * FROM categorias WHERE status = 1 ORDER BY id DESC ";
    $stmt = Conexao::getInstancia()->query($query);
    $resultado = $stmt->fetchAll();

    return $resultado;
  }

  public function buscarPorId(int $id): bool | object
  {
    $query = "SELECT * FROM categorias WHERE id ={$id} ";
    $stmt = Conexao::getInstancia()->query($query);
    $resultado = $stmt->fetch();

    return $resultado;
  }

  public function posts(int $id): array
  {
    $query = "SELECT * FROM posts WHERE categoria_id = {$id} AND status = 1 ORDER BY id DESC ";
    $stmt = Conexao::getInstancia()->query($query);
    $resultado = $stmt->fetchAll();

    return $resultado;
  }

  public function armazenar(array $dados): void
  {
    $query = "INSERT INTO `categorias` (`titulo`,`texto`, `status`) VALUES (?, ?, ?);";
    $stmt = Conexao::getInstancia()->prepare($query);
    $stmt->execute([$dados["titulo"],$dados["texto"],$dados["status"]]);
  }
}
