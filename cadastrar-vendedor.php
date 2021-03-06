<?php 

include __DIR__.'/vendor/autoload.php';


use \App\Entity\Vendedor;

if (isset($_POST['name'], $_POST['email'])) {
  
    
    $vendedor = new Vendedor;
    $vendedor->name = $_POST['name'];
    $vendedor->email = $_POST['email'];
    
    try 
    {
        $vendedor->create();
    
        header('location: vendedores.php?status=success');
        
        exit;
        
    } finally {
        header('location: vendedores.php?status=error');
        
        exit;
    }
}

include __DIR__.'/layouts/header.php';
include __DIR__.'/pages/vendedor/cadastrar.php';
include __DIR__.'/layouts/footer.php';