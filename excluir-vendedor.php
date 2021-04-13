<?php 

include __DIR__.'/vendor/autoload.php';


use \App\Entity\Vendedor;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: vendedores.php?status=error');
    exit;
}

$vendedor = Vendedor::show($_GET['id']);

if(!$vendedor instanceof Vendedor){
    header('location: vendedores.php?status=error');
    exit;
}

if (isset($_POST['delete'])) {    
    try
    {
        $vendedor->delete();
    
        header('location: vendedores.php?status=success');
        exit;

    } finally {
        header('location: vendedores.php?status=error');
        
        exit;
    }
}

include __DIR__.'/layouts/header.php';
include __DIR__.'/pages/vendedor/excluir.php';
include __DIR__.'/layouts/footer.php';