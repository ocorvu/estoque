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

<body>
<header>
    <h1 class="title mb-10 center">
        Painel
    </h1>
    <nav class="w-100">
        <ul class="flex mb-10 w-100">
            <li>
                <a class="link" href="/admin/usuarios/cadastrar">
                    <img class="mr-5" src="<?= asset('IMAGES/nav-cadastrar.png') ?>" alt="icone cadastro">REGISTRAR
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
</body>
</html>