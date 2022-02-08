<?php

use ocorvu\Estoque\Controller\UsuarioController;
use ocorvu\Estoque\Model\Acesso;
require_once "../../../vendor/autoload.php";
session_start();

Acesso::notLogged();

if ($_SESSION['nivel'] != 3) {
    header("location: /");
}

if (!empty($_GET)) {
    UsuarioController::cadastrarUsuario(
        $_GET['nivel'], 
        $_GET['usuario'], 
        $_GET['nome']
    );
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque - Novo Usuário</title>
    <link rel="shortcut icon" href="../../../public/IMAGES/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="../../../public/style.css">
</head>
<body>

<header>
    <h1 class="title mb-10 center">
        ESTOQUE
    </h1>
    <nav class="w-100">
        <ul class="flex mb-10 w-100">
            <li>
                <a class="link" href="painelAdmin.php">
                    <img class="mr-5" src="../../../public/IMAGES/admin.png" alt="icone cadastro">ADMIN
                </a>
            </li>
        </ul>
    </nav>
</header>
<main>
    <h2 class="mb-10 center">Registrar</h2>
    <section>
        <form
            class="w-80 m-auto"  
            action="" 
            method="GET"
        >
            <label for="idNome">Nome</label>
            <input class="w-50" name="nome" id="idNome" type="text" maxlength="40" required>

            <label for="idNivel">Nível de acesso</label>
            <input name="nivel" id="idNivel" type="number" min="1" max="3" value="1" required>

            <label for="idUsuario">Usuário</label>
            <input name="usuario" id="idUsuario" class="" type="text" maxlength="16" required>

            <button class="btn m-auto" type="submit">Registrar</button>
        </form>
        <p class="w-80 m-auto pt-10 small">A senha é gerada automaticamente. Você irá encontra-la no painel do administrador.</p>
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