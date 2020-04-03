<?php

class Conexao{

    public static function pegarConexao(){
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=estoque', 'root', '');
        return $conexao;
    }
}