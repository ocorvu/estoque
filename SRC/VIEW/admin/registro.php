<?php

use ocorvu\Estoque\Controller\UsuarioController;
use ocorvu\Estoque\Model\Acesso;

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

<body>

<header>
    <h1 class="title mb-10 center">
        ESTOQUE
    </h1>
    <nav class="w-100">
        <ul class="flex mb-10 w-100">
            <li>
                <a class="link" href="/admin/painel">
                    <img class="mr-5" src="<?= asset('IMAGES/admin.png') ?>" alt="icone cadastro">ADMIN
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
</body>
</html>