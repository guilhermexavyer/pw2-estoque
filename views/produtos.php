<?php
require_once "controllers/ProdutoController.php";

$controller = new ProdutoController();
$produtos = $controller->findAll();
?>

<h1>Lista de Produtos</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Categoria</th>
        <th>Preço</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($produtos as $produto) : ?>
        <tr>
            <td><?php echo $produto->getId(); ?></td>
            <td><?php echo $produto->getNome(); ?></td>
            <td><?php echo $produto->getDescricao(); ?></td>
            <td><?php echo $produto->getCategoria(); ?></td>
            <td><?php echo $produto->getPreco(); ?></td>
            <td>
                <a href="editar_produto.php?id=<?php echo $produto->getId(); ?>">Editar</a>
                <a href="excluir_produto.php?id=<?php echo $produto->getId(); ?>">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="adicionar_produto.php">Adicionar Produto</a>