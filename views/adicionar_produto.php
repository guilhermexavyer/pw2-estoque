<?php
require_once "controllers/CategoriaController.php";

$categoriaController = new CategoriaController();
$categorias = $categoriaController->findAll();
?>

<h1>Cadastrar Produto</h1>

<form action="salvar_produto.php" method="post">
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome"><br>
    
    <label for="descricao">Descrição:</label><br>
    <textarea id="descricao" name="descricao"></textarea><br>
    
    <label for="categoria">Categoria:</label><br>
    <select id="categoria" name="categoria">
        <?php foreach ($categorias as $categoria) : ?>
            <option value="<?php echo $categoria->getId(); ?>"><?php echo $categoria->getNome(); ?></option>
        <?php endforeach; ?>
    </select><br>
    
    <label for="preco">Preço:</label><br>
    <input type="text" id="preco" name="preco"><br>
    
    <input type="submit" value="Salvar">
</form>
