<?php require_once 'global.php' ?>
<?php
    try {
        $id = $_GET['id'];
        $categoria = new Categoria($id);
        $categoria->carregarProdutos();
        $listaProdutos= $categoria->produtos;
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Detalhe da Categoria</h2>
    </div>
</div>

<dl>
<dt>ID</dt>
    <dd><?php echo $categoria->id ?></dd>
    <dt>Nome</dt>
    <dd><?php echo $categoria->nome ?></dd>
    <dt>Produtos</dt>
    <?php if (count($listaProdutos) > 0): ?>
        <dd>
            <ul>
                <?php foreach($listaProdutos as $linha): ?>
                    <li><a href="/produtos-editar.php?id=<?php echo $linha['id'] ?>"><?php echo $linha['nome'] ?></a></li>
                <?php endforeach ?>
            </ul>
        </dd>
    <?php else: ?>
        <dd>Não existem produtos para esta categoria</dd>
    <?php endif ?>
</dl>
<?php require_once 'rodape.php' ?>
