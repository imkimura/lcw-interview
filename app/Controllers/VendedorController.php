<?php

namespace App\Controllers;

use \App\Database\DB;
use \App\Models\Vendedor;
use \PDO;

class VendedorController extends Vendedor {

    public function index() {
   
        return (new DB('seller'))
            ->read()
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}