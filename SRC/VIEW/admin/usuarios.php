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
</body>
</html>