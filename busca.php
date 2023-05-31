<?php

use App\Model\Conexao;
require_once 'App\View\header.php';
require_once 'vendor/autoload.php';

if(!isset($_GET['nome_prod'])){
  header('Location: index.php');
  exit;
}

if(empty($_GET['nome_prod'])){
  header(('Location: index.php'));
  exit;
}

// $nome = '%'.trim($_GET['nome_prod']).'%';

// // $dbh = new \App\Model\Conexao();
// $sql = 'SELECT * FROM produtos WHERE nome LIKE :nome OR :id';
// $stmt = Conexao::getCon()->prepare($sql);
// $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
// $stmt->bindParam(':id', $nome, PDO::PARAM_INT);
// $stmt->execute();
// $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$termoBusca = trim($_GET['nome_prod']);

$sql = 'SELECT * FROM produtos WHERE nome LIKE :nome OR id = :id';
$stmt = Conexao::getCon()->prepare($sql);
$stmt->bindParam(':nome', $termoBusca, PDO::PARAM_STR);
$stmt->bindParam(':id', $termoBusca, PDO::PARAM_INT);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>

<body>
  <h2 class="text-center mt-5 mb-3">Resultado da busca</h2>
  <?php
if (count($resultados)) {
  echo "
  <div class='container text-center'>
    <div class='row'>";
  foreach ($resultados as $resultado) {
    echo " <div class='col-md-4 mb-4'>
    <div class='card'>
      <h4 class='text-center mt-4'>{$resultado['nome']}</h4>
      <h6 class='text-center'>id={$resultado['id']}</h6>
      <p class='text-center'>{$resultado['descrição']}</p>
      <p class='text-center'>R$ {$resultado['valor']}</p>
      <div class='d-flex flex-row justify-content-center mb-4'>
        <a href='editar.php?id={$resultado['id']}' class='text-light text-decoration-none me-3'><button class='btn btn-primary'>Editar</button></a>
        <a href='deletar.php?id={$resultado['id']}' class='text-light text-decoration-none ms-3'><button class='btn btn-danger'>Deletar</button></a>
      </div>
    </div>
  </div>";
  }
  echo "
    </div>   
  </div>";

} else {
  $prod_busca = $_GET['nome_prod'];
   echo "
      <div class='col-sm-4 offset-sm-4 text-center'>
        <div class='alert alert-danger' role='alert'>
          <h5 class='text-center mb-0'>Não foram encontrados resultados pelo termo {$prod_busca}</h5>
        </div>
      </div>";
}
?>

</body>

</html>