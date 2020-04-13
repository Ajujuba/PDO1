<?php

class Produto
{
    public $id;
    public $nome;
    public $preco;
    public $quantidade;
    public $categoria_id;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT nome, preco, quantidade, categoria_id FROM produtos WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->nome = $linha['nome'];
        $this->preco = $linha['preco'];
        $this->quantidade = $linha['quantidade'];
        $this->categoria_id = $linha['categoria_id'];
    }

    public static function listar()
    {
        $query = "SELECT p.id, p.nome, preco, quantidade, categoria_id, c.nome as categoria_nome
                  FROM produtos p
                  INNER JOIN categorias c ON p.categoria_id = c.id
                  ORDER BY p.nome ";
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
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':quantidade', $this->quantidade);
        $stmt->bindValue(':categoria_id', $this->categoria_id);
        $stmt->execute();
    }

    public function atualizar()
    {
        $query = "UPDATE produtos SET nome = :nome, preco = :preco, quantidade = :quantidade, categoria_id = :categoria_id WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':quantidade', $this->quantidade);
        $stmt->bindValue(':categoria_id', $this->categoria_id);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function excluir()
    {
        $query = "DELETE FROM produtos WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue('id', $this->id);
        $stmt->execute();
    }
}