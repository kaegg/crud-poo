<?php

require_once 'vendor/autoload.php';
require_once 'App/view/header.php';

$nome = $_POST['nome'] ?? '';
$desc = $_POST['descricao'] ?? '';
$valor = $_POST['valor'] ?? '';

$produto = new \App\Model\Produto();
$produto->setNome($nome);
$produto->setDesc($desc);
$produto->setValor($valor);

$criar = new \App\Model\ProdutoDao();

?>

<h1 class="text-center mb-3 mt-5">Controle de produtos</h1>

<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if($_POST['nome'] != "" && $_POST['descricao'] != "" && $_POST['valor'] != ""){
    
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
          <span class="input-group-text">Produto</span>
          <input class="form-control form-control-sm" type="text" name="nome"><br>
        </div>
        <div class="input-group flex-nowrap">
          <span class="input-group-text">Descrição</span>
          <input class="form-control form-control-sm" type="text" name="descricao"><br>
        </div>
        <div class="input-group flex-nowrap mt-4">
          <span class="input-group-text">Preço R$</span>
          <input class="form-control form-control-sm" type="text" name="valor"><br>
        </div>
        <button type="submit" value="adicionar" class="btn btn-success mt-4 mb-5">Adicionar</button>
      </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-4 mb-4">
      <!-- <h5>Buscar</h5>
      <form action="busca.php" method="GET">
        <div class="input-group">
          <input type="text" name="nome_prod" id="buscar">
          <button class="btn btn-secondary" type="submit" value="buscar"><svg xmlns="http://www.w3.org/2000/svg"
              width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg></button>
        </div>
      </form> -->
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
        <p class='text-center'>R$ {$produto['valor']}</p>
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

  // http://localhost/crud_poo/busca.php?nome_prod=