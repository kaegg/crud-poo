<?php

require_once 'vendor/autoload.php';

$produto = new \App\Model\Produto();
$produto->setNome('Notebook');
$produto->setDesc('i5, 8gb, 256gb SSD');

$produto2 = new \App\Model\Produto();
$produto2->setNome('Mouse');
$produto2->setDesc('Razer');

$produto3 = new \App\Model\Produto();
$produto3->setNome('Escrivaninha');
$produto3->setDesc('Madeira, largra: 1,50');

$produto4 = new \App\Model\Produto();
$produto4->setId(9);
$produto4->setNome('Microfone AT2020');
$produto4->setDesc('Microfone Condensador');

$produtoDao = new \App\Model\ProdutoDao();
// $produtoDao->create($produto);
// $produtoDao->create($produto2);
// $produtoDao->create($produto3);
$produtoDao->delete($produto4);
$produtoDao->read();

foreach($produtoDao->read() as $produto){
  echo $produto['nome'] . "<br>" . $produto['descrição'] . "<hr>";
}
echo "<pre>";
print_r($produto);