<?php
require './APP/DATABASE/Database.php';

Class Guiche{
    public int $id_guiche;
    public string $num_guiche;
    public string $nome_guiche;


    public function buscar($where=null, $order=null, $limit=null){
        $db = new Database('Guiche');

        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }

    public function buscar_por_id($id_guiche){
        $db = new Database('Guiche');

        $obj = $db->select('id_guiche ='.$id_guiche)->fetchObject(self::class);
        return $obj;
    }
    public function excluir(){
        $db = new Database('Guiche');
        $res = $db->delete('id_guiche ='.$this->id_guiche);
        return $res;
    }
    public function editar(){
        $db = new Database('Guiche');
        $res= $db->update(
            'Guiche',
            [
                "nome_guiche"=>$this->nome_guiche,
                "num_guiche"=>$this->num_guiche
            ],
            'id_guiche='.$this->id_guiche
        );
        return $res;

    }

    public function alternar_ativo(){
        $db = new Database('Guiche');
        $obj = $this->buscar_por_id($this->id_guiche); 
        $novo_ativo = ($obj->ativo == 1) ? 0 : 1;
        $res = $db->update(
            'Guiche',
            ['ativo' => $novo_ativo],
            'id_guiche = ' . $this->id_guiche 
        );
        return $res; 
    }
    
}