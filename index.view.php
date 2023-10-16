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
            <p class="erro center">Usuário ou senha incorretos!</p>
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

</body>
</html>