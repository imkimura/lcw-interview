<?php 

include __DIR__.'/vendor/autoload.php';

use \App\Entity\Venda;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: vendas.php?status=error');
    exit;
}

$venda = Venda::show($_GET['id']);

if(!$venda instanceof Venda){
    header('location: vendas.php?status=error');
    exit;
}

if (isset($_POST['delete'])) {
    
    try
    {
        $venda->delete();
        
        echo json_encode(array('success' => true));
        header('location: vendas.php?status=success');
        exit;

    } finally {
        header('location: vendas.php?status=error');
        
        exit;
    }
}