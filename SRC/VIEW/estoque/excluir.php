<?php

use ocorvu\Estoque\Controller\EstoqueController;
use ocorvu\Estoque\Model\Acesso;

require_once '../../../vendor/autoload.php';

session_start();

Acesso::notLogged();

if ($_SESSION['nivel'] != 3) {
    header("location: ./index.php");
}

$produto = new EstoqueController();
if (!empty($_POST)) {
    $produto->remover($_POST['id']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque - Excluir</title>
    <link rel="stylesheet" href="../../../public/style.css">
    <link rel="shortcut icon" href="../../../public/IMAGES/favicon.ico" type="image/x-icon">
</head>
<body>
<header>
    <h1 class="title mb-10 center">
        <a class="link" href="index.php">ESTOQUE</a>
    </h1>
    <nav class="w-100">
        <ul class="flex mb-10 w-100">
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
        <?php 
        $produto = $produto->listarProdutos(null, $_GET['id']);

        foreach ($produto as $linha => $coluna) { 
        ?>
        <h2 class='mb-10 center'>
            EXCLUIR <?php echo $coluna['descricao']; }?>
        </h2>
        <form method="POST">
            <div class="center mb-10">
                <button
                    class="btn inline"
                    type="submit"
                    formaction="./index.php"
                    value="<?php echo $_GET['id']?>"
                >
                    Voltar
                </button>
                <button
                    name="id"
                    class="btn danger inline"
                    type="submit"
                    formaction=""
                    value="<?php echo $_GET['id']?>"
                >
                    Excluir
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