<?php

require_once 'vendor/autoload.php';

echo "Você tem certeza de que quer apagar este produto?";

?>

<form action="" method="post">
  <button type="submit" name="submit" value="Sim">Sim</button>
  <button><a href="index.php">Não</a></button>
</form>

<?php

$teste = $_GET['id'];
$produtoDao = new \App\Model\ProdutoDao();
$id = new \App\Model\Produto();
$id->setId($teste);
echo "<pre>";
print_r ($id);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['submit'] === "Sim") {
    $produtoDao->delete($id);
    $produtoDao->read();
    header("Location: index.php");
    exit; // Terminar a execução do script após o redirecionamento
  }
}