<?php
    require_once 'global.php';

    try {
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $preco = $_POST['preco'];
        $categoria_id = $_POST['categoria_id'];

        $produto = new Produto();

        $produto->nome = $nome;
        $produto->quantidade = $quantidade;
        $produto->preco = $preco;
        $produto->categoria_id = $categoria_id;
        $produto->inserir();

        header('Location: produtos.php');

    } catch (Exception $e) {
        Erro::trataErro($e);
    }