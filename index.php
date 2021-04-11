<?php 

include __DIR__.'/vendor/autoload.php';


use \App\Entity\Venda;

$vendas = Venda::index();

include __DIR__.'/layouts/header.php';
include __DIR__.'/pages/index.php';
include __DIR__.'/layouts/footer.php';