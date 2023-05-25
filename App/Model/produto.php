<?php

namespace App\Model;

class Produto
{

  private $id, $nome, $descricao;
  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }
  
  public function getNome(){
    return $this->nome;
  }

  public function setNome($nome){
    $this->nome = $nome;
  }

  public function getDesc(){
    return $this->descricao;
  }

  public function setDesc($desc){
    $this->descricao = $desc;
  }

}