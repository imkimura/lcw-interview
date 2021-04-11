<?php 

include __DIR__.'/vendor/autoload.php';


use \App\Entity\Vendedor;
use \App\Entity\Venda;

$vendedores = Vendedor::index();

if (isset($_POST['value'], $_POST['seller_id'])) {
  
    
    $venda = new Venda;
    $venda->value = $_POST['value'];
    $venda->seller_id = $_POST['seller_id'];
    
    $venda->create();
  
    header('location: index.php?status=success');
    
    exit;
}

include __DIR__.'/layouts/header.php';
include __DIR__.'/pages/vendas/index.php';
include __DIR__.'/layouts/footer.php';