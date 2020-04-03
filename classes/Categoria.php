<?php

require_once 'classes/Conexao.php';

class Categoria
{

    public $id;
    public $nome;

    public function __construct($id = false){
        if($id){
            $this->id = $id;
            $this->carregar();
        }
    }

    public function listar()
    {
        $query = "SELECT id, nome FROM categorias";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);  // método query retorna um objeto (pdo statment) retorna as linhas 
        $lista = $resultado->fetchAll(); // retorna o array com todas as linhas da consulta
        return $lista;
    }

    public function carregar(){
        $query = "SELECT id, nome FROM categorias where id = " . $this->id;
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query); 
        $lista = $resultado->fetchAll();
        foreach($lista as $linha){
            $this->nome = $linha['nome'];
        }
    }

    public function inserir($nome){
        $query= "insert into categorias (nome) values ('" . $this->nome ."')";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query); //método exec só executa
    }

    public function atualizar(){
        $query= "update categorias set nome = '" . $this->nome ."' where id = '" . $this->id ."'";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function excluir()
    {
        $query = "DELETE FROM categorias WHERE id = " . $this->id;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

  
}