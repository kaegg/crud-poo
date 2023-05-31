<?php

require_once 'vendor/autoload.php';
require_once 'App/view/header.php';

?>

<form action="" method="post" class="text-center">
  <h4 class="mb-5 mt-5">Você tem certeza de que quer apagar este produto?</h4>
  <button type="submit" name="submit" value="Sim" class="btn-lg btn btn-danger me-3">Sim</button>
  <button class="btn-lg btn btn-primary ms-3"><a href="index.php" class="text-light text-decoration-none
text-light text-decoration-none">Não</a></button>
</form>

<?php

$teste = $_GET['id'];
$produtoDao = new \App\Model\ProdutoDao();
$id = new \App\Model\Produto();
$id->setId($teste);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['submit'] === "Sim") {
    $produtoDao->delete($id);
    $produtoDao->read();
    header("Location: index.php");
    exit;
  }else{
    header('Location: index.php');
  }
}