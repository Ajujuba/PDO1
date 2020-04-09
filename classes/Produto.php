<?php

class Produto {

    public $id;
    public $nome;
    public $preco;
    public $quantidade;
    public $categoria_id;


    public static function listar()
    {
        $query = "SELECT p.id, p.nome, preco, quantidade, categoria_id, c.nome as categoria_nome
                  FROM produtos p
                  INNER JOIN categorias c ON p.categoria_id = c.id";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir()
    {
        $query = "INSERT INTO produtos (nome, preco, quantidade, categoria_id)
                  VALUES (:nome, :preco, :quantidade, :categoria_id)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome); // valida o dado pra previnir sql injection
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':quantidade', $this->quantidade);
        $stmt->bindValue(':categoria_id', $this->categoria_id);
        $stmt->execute(); // metodo do pdo stmt
        
    }


}