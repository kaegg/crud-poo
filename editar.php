<?php

require_once 'vendor/autoload.php';

$pegar_id = $_GET['id'];
$produto = new \App\Model\Produto();
$produto->setId($pegar_id);

$desc_prod = new \App\Model\ProdutoDao();

$produto = $desc_prod->read();

echo "<pre>";
print_r($produto);

?>

<form action="" method="post">
  Nome:<input type="text" name="nome" id="">
  Descrição:<input type="text" name="descricao" id="">
  <button type="submit" value="atualizar">Atualizar</button>
</form>

<?php

$prod_atualizado = new \App\Model\Produto();
$nome = $_POST['nome'];
$desc = $_POST['descricao'];
$prod_atualizado->setNome($nome);
$prod_atualizado->setDesc($desc);
$prod_atualizado->setId($pegar_id);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  if($_POST['nome'] && $_POST['descricao']){
    $desc_prod->update($prod_atualizado);
  }
}

echo "<pre>";
print_r($prod_atualizado);
