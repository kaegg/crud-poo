<?php

require_once 'vendor/autoload.php';
require_once 'App/view/header.php';

$nome = $_POST['nome'] ?? '';
$desc = $_POST['descricao'] ?? '';

$produto = new \App\Model\Produto();
$produto->setNome($nome);
$produto->setDesc($desc);

$criar = new \App\Model\ProdutoDao();

?>

<h1 class="text-center mb-3 mt-5">Controle de produtos</h1>

<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if($_POST['nome'] != "" && $_POST['descricao'] != ""){
    
      $criar->create($produto);
      header("Location: index.php");
      exit;
    
    }else{
    
      echo "
      <div class='col-sm-4 offset-sm-4 text-center'>
        <div class='alert alert-danger' role='alert'>
          <h5 class='text-center mb-0'>O campo nome e descrição devem estar preenchidos</h5>
        </div>
      </div>";
    
    }
  
  }
?>

<div class="container">
  <div class="row">
    <div class="col-sm-4 offset-sm-4">
      <form action="" method="post" class="text-center">
        <div class="input-group flex-nowrap mb-4">
          <span class="input-group-text" id="addon-wrapping">Produto</span>
          <input class="form-control form-control-sm" type="text" name="nome"><br>
        </div>
        <div class="input-group flex-nowrap">
          <span class="input-group-text" id="addon-wrapping">Descrição</span>
          <input class="form-control form-control-sm" type="text" name="descricao"><br>
        </div>
        <button type="submit" value="adicionar" class="btn btn-success mt-4 mb-5">Adicionar</button>
      </form>
    </div>
  </div>
</div>

<?php

echo "
  <div class='container text-center'>
    <div class='row'>";
      
foreach ($criar->read() as $produto) {
  echo "
    <div class='col-md-4 mb-4'>
      <div class='card'>
        <h4 class='text-center mt-4'>{$produto['nome']}</h4>
        <h6 class='text-center'>id={$produto['id']}</h6>
        <p class='text-center'>{$produto['descrição']}</p>
        <div class='d-flex flex-row justify-content-center mb-4'>
          <a href='editar.php?id={$produto['id']}' class='text-light text-decoration-none me-3'><button class='btn btn-primary'>Editar</button></a>
          <a href='deletar.php?id={$produto['id']}' class='text-light text-decoration-none ms-3'><button class='btn btn-danger'>Deletar</button></a>
        </div>
      </div>
    </div>";
}

echo "
    </div>   
  </div>";