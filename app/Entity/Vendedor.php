<?php

namespace App\Entity;

use \App\Database\DB;
use \PDO;

class Vendedor
{
    /**
     * Id do vendedor
     * @var int $id
     */
    public $id;
    
    /**
     * Nome do vendedor
     * @var string $name
     */
    public $name;
    
    /**
     * Email do vendedor
     * @var string $email
     */
    public $email;  

    /**
     *  Lista todos os Vendedores
     * @return Array(Vendedor)
    */
    public function index() {   
        return (new DB('seller'))
            ->read()
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     *  Retorna um vendedor expecífico
     * @param id
     * @return Vendedor
    */
    public function show($id) {   
        return (new DB('seller'))
            ->read('id = '. $id)
            ->fetchObject(self::class);
    }

    /**
     *  Cria um vendedor 
    */
    public function create() {   
        $db = new DB('seller');

        $this->id = $db->create([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        return true;
    }

    /**
     *  Edita um vendedor 
    */
    public function update() {   
        return (new DB('seller'))
            ->update('id = '. $this->id, [
                'name' => $this->name,
                'email' => $this->email,
            ]);
    }
    
    /**
     *  Exclui um vendedor 
    */
    public function delete() {   
        return (new DB('seller'))->delete('id = '.$this->id);
    }
}