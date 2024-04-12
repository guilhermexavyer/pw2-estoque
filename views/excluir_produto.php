<?php
require_once "controllers/ProdutoController.php";

$id = $_GET['id'];

$produtoController = new ProdutoController();
$produtoController->delete($id);

echo "Produto excluído com sucesso!";
?>