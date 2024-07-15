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

  public function pesquisa(string $busca): array
  {
    $query = "SELECT * FROM posts WHERE status = 1 AND titulo LIKE '%{$busca}%' ";
    $stmt = Conexao::getInstancia()->query($query);
    $resultado = $stmt->fetchAll();

    return $resultado;
  }

  public function armazenar(array $dados): void
  {
    $query = "INSERT INTO `posts` (`categoria_id`, `titulo`, `texto`, `status`) VALUES ( :categoria_id , :titulo, :texto, :status);";

    $stmt = Conexao::getInstancia()->prepare($query);
    $stmt->execute($dados);
  }

}
