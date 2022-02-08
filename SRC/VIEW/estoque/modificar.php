<?php

use ocorvu\Estoque\Controller\EstoqueController;
use ocorvu\Estoque\Model\Acesso;

require_once '../../../vendor/autoload.php';
session_start();

Acesso::notLogged();

if ($_SESSION['nivel'] == 1) {
    header("location: ./index.php");
}

$produtos = new EstoqueController();
if (!empty($_POST)) {
    $produtos->alterar(
        $_POST['id'], 
        $_POST['descricao'], 
        $_POST['quantidade']
    );
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque - Modificar</title>
    <link rel="stylesheet" href="../../../public/style.css">
    <link rel="shortcut icon" href="../../../public/IMAGES/favicon.ico" type="image/x-icon">
</head>
<body>
<header>
        <h1 class="title mb-10 center"><a class="link" href="index.php">ESTOQUE</a></h1>
        <nav>
            <ul class="flex mb-10">
                <li>
                    <a class="link" href="cadastrar.php">
                        <img class="mr-5" src="../../../public/IMAGES/nav-cadastrar.png" alt="icone cadastro">CADASTRAR
                    </a>
                </li>
                <li>
                    <a class="link" href="icones.php">
                        <img class="mr-5" src="../../../public/IMAGES/nav-inicio.png" alt="icone inicio">ÍCONES
                    </a>
                </li>
            </ul>
        </nav>
</header>
<main class="w-100">
    <section class="m-auto w-80">
        <h2 class="mb-10 center">MODIFICAR PRODUTO</h2>
        <p class="mb-10">
            Preencha os campos que deseja alterar:
        </p>

        <table class="w-100 center">
            <thead>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php
                $produtos = new EstoqueController();
                $produto = $produtos->listarProdutos(null, $_GET['id']);
                foreach ($produto as $linha => $coluna) { ?>
                    <tr>
                        <td><?= $coluna['descricao'] ?></td>
                        <td><?= $coluna['quantidade'] ?></td>
                        <td id="acoes">
                        <form mehtod='GET'>
                            <button
                                class="detalhes"
                                name='id'
                                type='submit'
                                formaction='detalhes.php' 
                                value='<?= $coluna['id'] ?>'
                                title='Detalhes'
                            >
                            <button 
                                class="modificar"
                                name='id'
                                type='submit'
                                formaction='modificar.php'
                                value='<?= $coluna['id'] ?>' 
                                title='Modificar' 
                            >
                            <button 
                                class="excluir"
                                name='id'
                                type='submit'
                                formaction='excluir.php' 
                                value='<?= $coluna['id'] ?>' 
                                title='Excluir' 
                            >
                        </form>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <form action="" method="POST">
        
        <?php 
        $produto = $produtos->listarProdutos(null, $_GET['id']);
        foreach ($produto as $linha => $coluna) { ?>
            
            <label for="iDescricao">Descrição</label>
            <input 
                class="w-100" 
                type="text" 
                name='descricao' 
                id="iDescricao" 
                size="20" 
                maxlength="30" 
                value='<?php echo $coluna['descricao'] ?>'
            >

            <label for="iQuantidade">Quantidade</label>
            <input 
                class="w-100" 
                type="number" 
                name='quantidade' 
                id="iQuantidade" 
                size="20" 
                maxlength="30" 
                value='<?php echo $coluna['quantidade'] ?>' 
            >
            <?php } ?>
        
            <div class="center mb-10">
                <button
                    class="btn inline"
                    type="submit"
                    formaction="./index.php"
                >
                    Voltar
                </button>
                <button 
                    class="btn inline"
                    name="id" 
                    type="submit"
                    value="<?= $_GET['id'] ?>"
                >
                    Modificar
                </button>
            </div>
        </form>
    </section>
</main>
<footer class="pb-10">
    <p class="center" id="copy">Copyright 2021 &copy - João da Mata</p>
    <p class="flex">
        <a class="link" href="https://github.com/ocorvu" target="_blank">
            <img class="mr-5" src="../../../public/IMAGES/github.png" alt="icone github">Github
        </a>
        <a class="link" href="https://www.linkedin.com/in/joaofhdm/" target="_blanl">
            <img class="mr-5" src="../../../public/IMAGES/linkedin.png" alt="icone linkedin">Linkedin
        </a>  
        <a class="link" href="https://twitter.com/damatajao" target="_blank">
            <img class="mr-5" src="../../../public/IMAGES/twitter.png" alt="icone twitter">Twitter
        </a>
        <a class="link" href="https://www.instagram.com/damatajao/" target="_blank">
            <img class="mr-5" src="../../../public/IMAGES/instagram.png" alt="icone instagram">Instagram
        </a>
    </p>
</footer>
</body>
</html>