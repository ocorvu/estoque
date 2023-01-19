<?php

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
    <title>Estoque - Painel Admin</title>
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
    <h2 class="mb-10 center">Bem-vindo, <?= $_SESSION['nome'] ?>!</h2>
    <section class="w-80 m-auto">
        <form method="POST" class="flex">
        <button 
            type="submit" 
            formaction="/produtos"
            class="btn mr-5"
        >
            Estoque
        </button>
        <button
            type="submit"
            formaction="/admin/usuarios"
            class="btn mr-5"
        >
            Usuarios
        </button>
        <button
            type="submit"
            class="btn mr-5" 
            disabled="disabled"
        >
            Loja(em breve!)
        </button>
        <button
                name="logout" 
                type="submit" 
                formaction=""
                class="btn danger mr-5"
                value="1"
            >
                SAIR
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