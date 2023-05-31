<?php

namespace App\Model;
use PDO;

class ProdutoDao
{

  public function create(Produto $p){

    $sql = 'INSERT INTO produtos (nome, descrição, valor) VALUES (?, ?, ?)'; 
    $stmt = Conexao::getCon()->prepare($sql); 
    $stmt->bindValue(1, $p->getNome());
    $stmt->bindValue(2, $p->getDesc());
    $stmt->bindValue(3, $p->getValor());

    $stmt->execute();

  }

  public function read(){

    $sql = 'SELECT * FROM produtos';
    $stmt = Conexao::getCon()->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() > 0){
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $res;
    }

  }

  public function update(Produto $p){

    $sql = 'UPDATE produtos SET nome = ?, descrição = ?, valor = ?  WHERE id = ?';
    $stmt = Conexao::getCon()->prepare($sql);
    $stmt->bindValue(1, $p-> getNome());
    $stmt->bindValue(2, $p-> getDesc());
    $stmt->bindValue(3, $p->getValor());
    $stmt->bindValue(4, $p->getId());
    
    $stmt->execute();

  }

  public function delete($id){

    $sql = 'DELETE FROM produtos WHERE id=?';
    $stmt = Conexao::getCon()->prepare($sql);
    $stmt->bindValue(1, $id->getId());

    $stmt->execute();

  }

  // public function search($nome){
    
  //   $sql = 'SELECT * FROM produtos WHERE nome LIKE :nome';
  //   $sth->bindParam(':nome', $nome, PDO::PARAM_STR);
  //   $sth->execute();
  
  //   $res = sth->fetchAll(PDO::FETCH_ASSOC);

  // }

}