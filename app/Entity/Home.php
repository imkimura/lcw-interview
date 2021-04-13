<?php

namespace App\Entity;

use \App\Database\DB;
use \PDO;

class Home
{
     
    /**
     *  Lista quantidade de venda por vendedor
    */
    public function listQtdSales() {   
        $query = "SELECT count(*) qtd, se.name 
                  FROM sale sa
                  INNER JOIN seller se
                  ON se.id = sa.seller_id
                  GROUP BY sa.seller_id
                  ORDER BY qtd DESC
                  LIMIT 5";
                
        return (new DB)->execute($query)->fetchAll();    
    }
     
    /**
     *  Lista quantidade de vendas por dia na semana
    */
    public function listQtdSalesByWeek() {   
        $query = "SELECT count(*) qtd, DATE_FORMAT(sale_date,'%d/%m/%Y') sale_date FROM sale
                  WHERE YEARWEEK(sale_date)=YEARWEEK(NOW())
                  GROUP BY DATE_FORMAT(sale_date, '%Y-%m-%d')";
                
        return (new DB)->execute($query)->fetchAll();    
    }

}