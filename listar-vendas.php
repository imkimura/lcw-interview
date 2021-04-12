<?php 

include __DIR__.'/vendor/autoload.php';


use \App\Entity\Venda;
use \App\Entity\Vendedor;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

$vendedor = Vendedor::show($_GET['id']);
$venda = new Venda;

if (!$vendedor instanceof Vendedor) {
    header('location: index.php?status=error');
    exit;
}

$vendas = $venda->listSalesBySeller($_GET['id']);

include __DIR__.'/layouts/header.php';
include __DIR__.'/pages/vendas/listagem-vendedor.php';
include __DIR__.'/layouts/footer.php';