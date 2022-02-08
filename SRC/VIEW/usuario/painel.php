<?php

use ocorvu\Estoque\Model\Acesso;

require_once "../../../vendor/autoload.php";
session_start();

Acesso::notLogged();

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
    <title>Estoque - Painel</title>
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
                <a class="link" href="#">
                    <img class="mr-5" src="../../../public/IMAGES/nav-cadastrar.png" alt="icone cadastro">BREVE
                </a>
            </li>
            <li>
                <a class="link" href="#">
                    <img class="mr-5" src="../../../public/IMAGES/login.png" alt="icone inicio">BREVE
                </a>
            </li>
        </ul>
    </nav>
</header>
<main>
    <h2 class="mb-10 center">Bem-vindo, <?= $_SESSION['nome'] ?>!</h2>
    <section>
        <form method="POST" class="flex">
            <button 
                type="submit" 
                formaction="../estoque/index.php"
                class="btn mr-5"
            >
                Estoque
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