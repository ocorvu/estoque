<?php

namespace ocorvu\Estoque\Model;

use ocorvu\Estoque\DB\Database;

date_default_timezone_set('America/Sao_Paulo');

class Estoque
{
    public function mostrarProdutos(string $descricao = null,  int $id = null): array 
    {
        $estoque = Database::conection();

        if ($descricao) {
            $sql = "SELECT id, descricao, quantidade FROM produtos WHERE descricao ILIKE '%$descricao%'";

            $query = $estoque->query($sql);
            $busca = $query->fetchAll();
        } elseif ($id) {
            $sql = "SELECT id, descricao, quantidade, data_cadastro, data_alteracao FROM produtos WHERE id = '$id'";

            $query = $estoque->query($sql);
            $busca = $query->fetchAll();
        } else {
            $sql = "SELECT id, descricao, quantidade FROM produtos";
            $query = $estoque->query($sql);
            $busca = $query->fetchAll();
        }
 
        return $busca;
    }
    public function cadastrarProduto(string $descricao, int $quantidade): void
    {
        $estoque = Database::conection();
        $descricao = strtoupper($descricao);
        $data_cadastro = date('Y-m-d');

        $sql = "INSERT INTO produtos 
                (descricao, quantidade, data_cadastro, data_alteracao) 
                VALUES 
                (:descricao, :quantidade, :data_cadastro, :data_alteracao)";

        $query = $estoque->prepare($sql);

        $query->bindValue(':descricao', $descricao);
        $query->bindValue(':quantidade', $quantidade);
        $query->bindValue(':data_cadastro', $data_cadastro);
        $query->bindValue(':data_alteracao', $data_cadastro);

        $query->execute();
    }
    public function modificarProduto(int $id, string $descricao, int $quantidade): void
    {
        $estoque = Database::conection();
        $descricao = strtoupper($descricao);
        $data_alteracao = date('Y-m-d');

        $sql = "UPDATE produtos SET descricao = :descricao, quantidade = :quantidade, data_alteracao = :data_alteracao  WHERE id = :id";

        $query = $estoque->prepare($sql);

        $query->bindValue(':descricao', $descricao);
        $query->bindValue(':quantidade', $quantidade);
        $query->bindValue(':data_alteracao', $data_alteracao);
        $query->bindValue(':id', $id);

        $query->execute();
    }
    public function deletarProduto(int $id): void
    {   
        $estoque = Database::conection();

        $sql = "DELETE FROM produtos WHERE id = :id";

        $query = $estoque->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
    }
}

