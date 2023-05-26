<?php

namespace App\Model;
use PDO;

class ProdutoDao
{

  public function create(Produto $p){

    $sql = 'INSERT INTO produtos (nome, descrição) VALUES (?, ?)'; 
    $stmt = Conexao::getCon()->prepare($sql); 
    $stmt->bindValue(1, $p->getNome());
    $stmt->bindValue(2, $p->getDesc());

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

    $sql = 'UPDATE produtos SET nome = ?, descrição = ? WHERE id = ?';
    $stmt = Conexao::getCon()->prepare($sql);
    $stmt->bindValue(1, $p-> getNome());
    $stmt->bindValue(2, $p-> getDesc());
    $stmt->bindValue(3, $p->getId());
    
    $stmt->execute();

  }

  public function delete($id){

    $sql = 'DELETE FROM produtos WHERE id=?';
    $stmt = Conexao::getCon()->prepare($sql);
    $stmt->bindValue(1, $id->getId());

    $stmt->execute();

  }

}