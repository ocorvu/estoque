<?php

use ocorvu\Estoque\Controller\UsuarioController;
use ocorvu\Estoque\Model\Acesso;

session_start();

Acesso::notLogged();

if ($_SESSION['nivel'] != 3) {
    header("location: /");
}

if (!empty($_POST && $_POST['logout'] == 1)) {
    Acesso::sair();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque - Login</title>
    <link rel="shortcut icon" href="../../../public/IMAGES/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../../public/style.css">
</head>
<body>
<header>
    <h1 class="title mb-10 center">
        Painel
    </h1>
    <nav class="w-100">
        <ul class="flex mb-10 w-100">
            <li>
                <a class="link" href="/admin/usuarios/cadastrar">
                    <img class="mr-5" src="../../../public/IMAGES/nav-cadastrar.png" alt="icone cadastro">REGISTRAR
                </a>
            </li>
        </ul>
    </nav>
</header>
<main>
    <h2 class="mb-10 center">Usuários</h2>
    <section>
        <table class="w-100 center">
            <thead>
                <th>Nível de Acesso</th>
                <th>Usuário</th>
                <th>Nome</th>
                <th>Senha</th>
                <th>Ações</th>
            </thead>
            <tbody>
            <?php foreach (UsuarioController::usuarios() as $linha => $coluna) { ?>
                <tr>
                    <td><?= $coluna['nivel_acesso'] ?></td>
                    <td><?= $coluna['usuario'] ?></td>
                    <td><?= $coluna['nome'] ?></td>
                    <td><?= $coluna['senha'] ?></td>
                    <td>
                        <form mehtod='GET'>
                            <button 
                                class='modificar'
                                name='id'
                                type='submit'
                                formaction='#'
                                value='<?= $coluna['id'] ?>' 
                                title='Modificar' 
                            >
                            <button 
                                class='excluir'
                                name='id'
                                type='submit'
                                formaction='#' 
                                value='<?= $coluna['id'] ?>' 
                                title='Excluir' 
                            >
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <form method="POST">
                <div class="center mb-10">
                    <button
                        class="btn inline"
                        type="submit"
                        formaction="./painelAdmin.php"
                        value=""
                    >
                        Voltar
                    </button>
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