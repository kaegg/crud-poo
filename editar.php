<?php

require_once 'vendor/autoload.php';
require_once 'App/view/header.php';

$pegar_id = $_GET['id'];
$produto = new \App\Model\Produto();
$produto->setId($pegar_id);

$desc_prod = new \App\Model\ProdutoDao();

$produto = $desc_prod->read();

foreach($produto as $produtos){

  if($produtos['id'] == $pegar_id){
    $prod = $produtos;
  }

}

?>

<h1 class="text-center mb-3 mt-5">Editar <?php echo $prod['nome']; ?></h1>

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
        <button type="submit" value="atualizar" class="btn btn-success mt-4 mb-5">Editar</button>
      </form>
    </div>
  </div>
</div>

<?php

$prod_atualizado = new \App\Model\Produto();
$nome = $_POST['nome'] ?? '';
$desc = $_POST['descricao'] ?? '';
$prod_atualizado->setNome($nome);
$prod_atualizado->setDesc($desc);
$prod_atualizado->setId($pegar_id);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  if($_POST['nome'] && $_POST['descricao']){
    $desc_prod->update($prod_atualizado);
  }
}


// echo "<pre>";
// print_r($prod_atualizado);
