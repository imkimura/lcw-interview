<?php

namespace App\Database;

use \PDO;

require_once __DIR__.'\..\..\config\database.php';


class DB {
   
    /**
    * Nome da tabela
    * @var string
    */
    private $table;

    /**
    * Conexão com o banco de dados
    * @var PDO
    */
    private $connection;

     
    /**
    * Método construtor
    * @param null|string $table
    */
    public function __construct($table=null) {
        $this->table = $table;
        $this->createConnection();
    }

    /**
    * Cria conexão com o banco
    */
    private function createConnection() {
        try {            
            $this->connection = new PDO('mysql:host='.HOST.';dbname='.NAME.";charset=utf8",USER,PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }  catch (PDOException $e) {

            die('Error: ' . $e->getMessage());
        }  
    }

    /**
    * Executa querys no banco de dados
    * @param string $query
    * @param array  $params
    * @return PDOStatement
    */ 
    public function execute($query, $params = []){
        try{
            
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement;

        } catch(PDOException $e) {

            die('ERROR: '.$e->getMessage());
        }
    }

    /**
    * Realiza consulta no banco
    * @param null|string $where
    * @param null|string $order
    * @param null|string $limit
    * @param null|string $fields
    * @return PDOStatement
    */
    public function read($where = null, $order = null, $limit = null, $fields = '*') {

        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
    
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
    
        return $this->execute($query);
    }

    /**
    * Realiza uma inserção de dados no banco
    * @param array $values [ field => value ]
    * @return integer ID inserido
    */
    public function create($values){        
        $fields = array_keys($values);
        $binds  = array_pad([],count($fields),'?');
        
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
        
        $this->execute($query,array_values($values));
        
        return $this->connection->lastInsertId();
    }

    /**
    * Realiza alterações no banco de dados
    * @param string $where
    * @param array $values [ field => value ]
    * @return boolean
    */
    public function update($where, $values){        
        $fields = array_keys($values);
        
        $query = 'UPDATE '.$this->table.' SET '.implode('= ?, ', $fields).' = ? WHERE '. $where;

        // echo "<pre>"; print_r($values); echo "</pre>"; exit;
        
        $this->execute($query, array_values($values));
        
        return true;
    }

    /**
    * Realiza uma exclusão dados do banco
    * @param string $where
    * @return boolean
    */
    public function delete($where){        
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        
        $this->execute($query);
        
        return true;
    }
}