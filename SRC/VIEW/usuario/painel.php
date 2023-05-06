<?php

use ocorvu\Estoque\Model\Acesso;

session_start();

Acesso::notLogged();

if (!empty($_POST && $_POST['logout'] == 1)) {
    Acesso::sair();
}

?>

<body>
<header>
    <h1 class="title mb-10 center">
        ESTOQUE
    </h1>
    <nav class="w-100">
        <ul class="flex mb-10 w-100">
            <li>
                <a class="link" href="#">
                    <img class="mr-5" src="<?= asset('IMAGES/nav-cadastrar.png') ?>" alt="icone cadastro">BREVE
                </a>
            </li>
            <li>
                <a class="link" href="#">
                    <img class="mr-5" src="<?= asset('IMAGES/login.png') ?>" alt="icone inicio">BREVE
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
</body>
</html>