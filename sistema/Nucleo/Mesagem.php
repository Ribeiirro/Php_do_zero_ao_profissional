<?php 

namespace sistema\Nucleo;

class Mensagem
{
  private $texto;
  private $css;

  public function __toString()
  {
    return $this->renderizar();
  }

  function sucesso(string $mensagem): Mensagem
  {
    $this-> css = 'alert alert-success';
    $this -> texto = $this->filtrar($mensagem);
    return $this;
  }

  function error(string $mensagem): Mensagem
  {
    $this-> css = 'alert alert-danger';
    $this -> texto = $this->filtrar($mensagem);
    return $this;
  }

  function warning(string $mensagem): Mensagem
  {
    $this-> css = 'alert alert-warning';
    $this -> texto = $this->filtrar($mensagem);
    return $this;
  }

  function info(string $mensagem): Mensagem
  {
    $this-> css = 'alert alert-primary';
    $this -> texto = $this->filtrar($mensagem);
    return $this;
  }

  public function renderizar(): string 
  {
    return "<div class='{$this->css}'>{$this->texto}</div>";
  }

  private function filtrar(string $mensagem): string
  {
    return filter_var(strip_tags($mensagem), FILTER_SANITIZE_SPECIAL_CHARS);
  }

  }
?>