<?php

require_once 'classes/Conexao.php';

class Categoria
{

    public $id;
    public $nome;

    public function listar()
    {
        $query = "SELECT id, nome FROM categorias";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);  // método query retorna um objeto (pdo statment) retorna as linhas 
        $lista = $resultado->fetchAll(); // retorna o array com todas as linhas da consulta
        return $lista;
    }

    public function inserir($nome){
        $query= "insert into categorias (nome) values ('" . $this->nome ."')";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query); //método exec só executa
    }
}