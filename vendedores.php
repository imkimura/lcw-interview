<?php

include __DIR__.'/vendor/autoload.php';

use \App\Entity\Vendedor;

$vendedores = Vendedor::index();

include __DIR__.'/layouts/header.php';
include __DIR__.'/pages/vendedor/index.php';
include __DIR__.'/layouts/footer.php';