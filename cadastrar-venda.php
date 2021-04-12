<?php 

include __DIR__.'/vendor/autoload.php';


use \App\Entity\Vendedor;
use \App\Entity\Venda;

$vendedores = Vendedor::index();

if (isset($_POST['value'], $_POST['seller_id'])) {
  
    
    $venda = new Venda;
    $venda->value = $_POST['value'];
    $venda->seller_id = $_POST['seller_id'];
    $venda->sale_date = $_POST['sale_date'];
    
    $venda->create();
  
    header('location: vendas.php?status=success');
    
    exit;
}

include __DIR__.'/layouts/header.php';
include __DIR__.'/pages/vendas/cadastrar.php';
include __DIR__.'/layouts/footer.php';