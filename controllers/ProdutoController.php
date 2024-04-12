<?php
require_once "models/Produto.php";
require_once "models/Conexao.php";

class ProdutoController {
    
    public function findAll(){
        $conexao = Conexao::getInstance();

        $stmt = $conexao->prepare("SELECT * FROM produto");

        $stmt->execute();
        $produtos = array();

        while($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $produtos[] = new Produto(
                $produto["nome"], 
                $produto["descricao"], 
                $produto["categoria_id"], 
                $produto["preco"]
            );
        }
        return $produtos;
    }

    public function save(Produto $produto){
        try{
            $conexao = Conexao::getInstance();
            $nome = $produto->getNome();
            $descricao = $produto->getDescricao();
            $categoria_id = $produto->getCategoria();
            $preco = $produto->getPreco();

            $stmt = $conexao->prepare("INSERT INTO produto (nome, descricao, categoria_id, preco) VALUES (:nome, :descricao, :categoria_id, :preco)");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":categoria_id", $categoria_id);
            $stmt->bindParam(":preco", $preco);

            $stmt->execute();

            // opcional: retornar o produto recém-criado
            // $produto = $this->findById($conexao->lastInsertId());

            return true;
        } catch (PDOException $e){
            echo "Erro ao salvar o produto: " . $e->getMessage();
            return false;
        }
    }

    public function update(Produto $produto){
        try{
            $conexao = Conexao::getInstance();
            $id = $produto->getId();
            $nome = $produto->getNome();
            $descricao = $produto->getDescricao();
            $categoria_id = $produto->getCategoria();
            $preco = $produto->getPreco();

            $stmt = $conexao->prepare("UPDATE produto SET nome = :nome, descricao = :descricao, categoria_id = :categoria_id, preco = :preco WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":categoria_id", $categoria_id);
            $stmt->bindParam(":preco", $preco);

            $stmt->execute();

            return true;
        } catch (PDOException $e){
            echo "Erro ao atualizar o produto: " . $e->getMessage();
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $conexao = Conexao::getInstance();

            $stmt = $conexao->prepare("DELETE FROM produto WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir o produto: " . $e->getMessage();
            return false;
        }
    }

    public function findById($id){
        try{
            $conexao = Conexao::getInstance();

            $stmt = $conexao->prepare("SELECT * FROM produto WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $produto = $stmt->fetch(PDO::FETCH_ASSOC);

            return new Produto(
                $produto["nome"], 
                $produto["descricao"], 
                $produto["categoria_id"], 
                $produto["preco"]
            );
        }catch (PDOException $e){
            echo "Erro ao buscar o produto: " . $e->getMessage();
            return false;
        }
    }
}