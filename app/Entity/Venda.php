<?php

namespace App\Entity;

use \App\Database\DB;
use \PDO;

class Venda
{
    
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
    
    /**
     *  Lista todas as Vendas
     * @return Array(Venda)
    */
    public function index() {   
        return (new DB('sale'))
            ->read()
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Retorna venda
     * @param id
     * @return Venda
    */
    public function show($id) {   
        return (new DB('sale'))
            ->read('id = '.$id)
            ->fetchObject(self::class);
    }

    /**
     *  Cria uma venda
    */
    public function create() {

        $this->sale_date = date('Y-m-d H:i:s');

        $db = new DB('sale');

        $this->id = $db->create([
            'seller_id' => $this->seller_id,
            'value' => $this->value,
            'sale_date' => $this->sale_date,
        ]);

        return true;
    }

    /**
    *  Edita uma venda
    */
    public function update(){
        return (new DB('sale'))
                ->update('id = '. $this->id, [
                    'seller_id' => $this->seller_id,
                    'value' => $this->value,
                    'sale_date' => $this->sale_date,
                ]);
    }

    /**
    *  Exclui uma venda
    */
    public function delete(){
        return (new DB('sale'))->delete('id = '.$this->id);
    }

    /**
    *  Listar todas as vendas de um vendedor
    */
    public function listSalesBySeller($seller_id){
        $query = "SELECT sa.id, se.name, se.email, sa.value, sa.sale_date 
                  FROM sale sa 
                  INNER JOIN seller se 
                  ON se.id = sa.seller_id
                  WHERE sa.seller_id = ". $seller_id;
                
        return (new DB)->execute($query)->fetchAll();        
    }

}