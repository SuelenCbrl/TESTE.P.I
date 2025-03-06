<?php
require './APP/DATABASE/Database.php';

class guiche{
    public int $id_guiche;
    public string $num_guiche;
    public string $nome_guiche;

    public function cadastrar_guiche(){
        $db= new Database('guiche');
        $res = $db->insert(
            [
                'identificador'=>$this->num_guiche,
                'nomeGuiche'=>$this->nome_guiche
            ]
            );
        return $res;
    }

}