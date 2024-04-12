<?php
require_once "controllers/CategoriaController.php";
require_once "controllers/ProdutoController.php";

$id = $_GET['id'];

$categoriaController = new CategoriaController();
$categorias = $categoriaController->findAll();

$produtoController = new ProdutoController();
$produto = $produtoController->findById($id);
?>

<h1>Editar Produto</h1>

<form action="atualizar_produto.php" method="post">
    <input type="hidden" name="id" value="<?php echo $produto->getId(); ?>">
    
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" value="<?php echo $produto->getNome(); ?>"><br>
    
    <label for="descricao">Descrição:</label><br>
    <textarea id="descricao" name="descricao"><?php echo $produto->getDescricao(); ?></textarea><br>
    
    <label for="categoria">Categoria:</label><br>
    <select id="categoria" name="categoria">
        <?php foreach ($categorias as $categoria) : ?>
            <option value="<?php echo $categoria->getId(); ?>" <?php echo ($categoria->getId() == $produto->getCategoria()) ? 'selected' : ''; ?>><?php echo $categoria->getNome(); ?></option>
        <?php endforeach; ?>
    </select><br>
    
    <label for="preco">Preço:</label><br>
    <input type="text" id="preco" name="preco" value="<?php echo $produto->getPreco(); ?>"><br>
    
    <input type="submit" value="Atualizar">
</form>