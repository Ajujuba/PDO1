<?php



class Conexao{

    public static function pegarConexao(){
        $conexao = new PDO(DB_DRIVE .':host=' . DB_HOSTNAME . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        return $conexao;
    }
}