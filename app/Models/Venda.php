<?php

namespace App\Models;

class Venda {

    /**
     * Id da venda
     * @var int $id
     */
    public $id;
    
    /**
     * id do vendedor
     * @var int $seller_id
     */
    public $seller_id;
    
    /**
     * valor da venda
     * @var float $value
     */
    public $value;
    
    /**
     * Data da venda
     * @var datetime $sale_date
     */
    public $sale_date;   
    
}