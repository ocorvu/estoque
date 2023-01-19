<?php

use ocorvu\Estoque\Model\Acesso;



session_start();

$login = true;

if (!empty($_POST)) {
    $login = Acesso::login($_POST['usuario'], $_POST['senha']);
}
if (isset($_SESSION['logged']) && $_SESSION['logged']) {
    Acesso::nivel($_SESSION['nivel']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque - Login</title>
    <link rel="shortcut icon" href="public/IMAGES/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
<header>
    <h1 class="title mb-10 center">
        ESTOQUE
    </h1>
    <nav class="w-100">
        <ul class="flex mb-10 w-100">
        </ul>
    </nav>
</header>
<main>
    <h2 class="mb-10 center">Login</h2>
    <section>
        <?php if (!$login) { ?>
            <p class="login center">Usuário ou senha incorretos!</p>
        <?php } ?>
        <form class="w-80 m-auto" action="" method="POST">
            <label for="iUsuario">Usuário</label>
            <input class="w-100" name="usuario" id="iUsuario" type="text">

            <label for="iSenha">Senha</label>
            <input class="w-100" name="senha" id="iSenha" type="password">

            <button class="btn m-auto" type="submit">Entrar</button>
        </form>
    </section>
</main>
<footer class="pb-10">
    <p class="center" id="copy">Copyright 2021 &copy - João da Mata</p>
    <p class="flex">
        <a class="link" href="https://github.com/ocorvu" target="_blank">
            <img class="mr-5" src="public/IMAGES/github.png" alt="icone github">Github
        </a>
        <a class="link" href="https://www.linkedin.com/in/joaofhdm/" target="_blanl">
            <img class="mr-5" src="<?= asset('IMAGES/linkedin.png') ?>" alt="icone linkedin">Linkedin
        </a>  
        <a class="link" href="https://twitter.com/damatajao" target="_blank">
            <img class="mr-5" src="public/IMAGES/twitter.png" alt="icone twitter">Twitter
        </a>
        <a class="link" href="https://www.instagram.com/damatajao/" target="_blank">
            <img class="mr-5" src="public/IMAGES/instagram.png" alt="icone instagram">Instagram
        </a>
    </p>
</footer>
</body>
</html>