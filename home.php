<?php

include __DIR__.'/vendor/autoload.php';

use \App\Entity\Home;

$quantidadeVendas = Home::listQtdSales();
$quantidadeVendasSemana = Home::listQtdSalesByWeek();

echo json_encode(array('success' => true, 'sellers' => $quantidadeVendas, 'week' => $quantidadeVendasSemana));
