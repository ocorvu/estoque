<?php

namespace ocorvu\Estoque\Controller;

use ocorvu\Estoque\Model\Estoque;

class EstoqueController 
{
    public function listarProdutos($descricao = null, $id = null)
    {
        $produtos = new Estoque();
        $busca = $produtos->mostrarProdutos($descricao, $id);
        return $busca;
    }

    public function alterar(int $id, string $descricao, int $quantidade): void 
    {
        header('location: ./index.php');
        $estoque = new Estoque();
        $estoque->modificarProduto($id, $descricao, $quantidade);
    }

    public function cadastrar(string $descricao, int $quantidade): void
    {
        $estoque = new Estoque();
        $estoque->cadastrarProduto($descricao, $quantidade);
    }

    public function remover(int $id): void
    {
        header('location: ./index.php');

        $estoque = new Estoque();
        $estoque->deletarProduto($id);
    }
}