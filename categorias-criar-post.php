<?php require_once 'classes/Categoria.php'; 
 
    $categoria = new Categoria();
    $nome = $_POST['nome'];
    $categoria->nome= $nome;
    $categoria->inserir($nome);

    header('Location: categorias.php');
?>