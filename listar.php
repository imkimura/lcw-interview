<?php 

include __DIR__.'/vendor/autoload.php';


use \App\Entity\Venda;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

$venda = Venda::show($_GET['id']);

if (!$venda instanceof Venda) {
    header('location: index.php?status=error');
    exit;
}

$vendasTotal = $venda->listSalesBySeller($_GET['id']);

echo "<pre>"; print_r($vendasTotal); echo "</pre>"; exit;

include __DIR__.'/layouts/header.php';
include __DIR__.'/layouts/footer.php';