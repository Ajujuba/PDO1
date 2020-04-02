<?php

class Categoria
{

    public $id;
    public $nome;

    public function listar()
    {
        $query = "SELECT id, nome FROM categorias";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=estoque', 'root', '');
        $resultado = $conexao->query($query);  // método query retorna um objeto (pdo statment) retorna as linhas 
        $lista = $resultado->fetchAll(); // retorna o array com todas as linhas da consulta
        return $lista;
    }
}