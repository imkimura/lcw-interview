<?php 

include __DIR__.'/vendor/autoload.php';


use \App\Entity\Vendedor;
use \App\Entity\Venda;

$vendedores = Vendedor::index();

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: vendas.php?status=error');
    exit;
}

$venda = Venda::show($_GET['id']);

if(!$venda instanceof Venda){
    header('location: vendas.php?status=error');
    exit;
}

if (isset($_POST['value'], $_POST['seller_id'])) {
  
    $venda->value = $_POST['value'];
    $venda->seller_id = $_POST['seller_id'];
    $venda->sale_date = $_POST['sale_date'];
    
    try
    {
        $venda->update();
  
        header('location: vendas.php?status=success');
        
        exit;

    } finally {
        header('location: vendas.php?status=error');
        
        exit;
    }
}

include __DIR__.'/layouts/header.php';
include __DIR__.'/pages/vendas/editar.php';
include __DIR__.'/layouts/footer.php';