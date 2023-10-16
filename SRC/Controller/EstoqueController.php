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
        header('location: /produtos');
        $estoque = new Estoque();
        $estoque->modificarProduto($id, $descricao, $quantidade);
    }

    public function cadastrar(string $descricao, int $quantidade)
    {
        $estoque = new Estoque();
        $cadastro = $estoque->cadastrarProduto($descricao, $quantidade);
        
        return [$cadastro, strtoupper($descricao)];
    }

    public function remover(int $id): void
    {
        header('location: /produtos');

        $estoque = new Estoque();
        $estoque->deletarProduto($id);
    }
}