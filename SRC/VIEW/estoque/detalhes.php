<?php

use ocorvu\Estoque\Controller\EstoqueController;
use ocorvu\Estoque\Model\Acesso;

session_start();

Acesso::notLogged();

?>

<body>
<header>
    <h1 class="title mb-10 center">
        <a class="link" href="index.php">ESTOQUE</a>
    </h1>
    <nav class="w-100">
        <ul class="flex mb-10 w-100">
            <li>
                <a class="link" href="cadastrar.php">
                    <img class="mr-5" src="<?= asset('IMAGES/nav-cadastrar.png') ?>" alt="icone cadastro">CADASTRAR
                </a>
            </li>
            <li>
                <a class="link" href="icones.php">
                    <img class="mr-5" src="<?= asset('IMAGES/nav-inicio.png') ?>" alt="icone inicio">ÍCONES
                </a>
            </li>
        </ul>
    </nav>
</header>
<main class="w-100">
    <section class="m-auto w-80">
        <?php 
        $produto = new EstoqueController();
        $produto = $produto->listarProdutos(null, $_GET['id']);

        foreach ($produto as $linha => $coluna) {
        ?>
            <h2 class='mb-10'>
                <?php echo $coluna['descricao']; ?>
            </h2>
            <p>
                <strong>Quantidade:</strong>
                <?php echo $coluna['quantidade']; ?>
            </p>
            <p>
                <strong>Data de Cadastro:</strong>
                <?php echo date('d/m/Y', strtotime($coluna['data_cadastro'])); ?></p>
            <p class='mb-10'>
                <strong>Ultima alteração:</strong>
                <?php echo date('d/m/Y', strtotime($coluna['data_alteracao'])); } ?>
            </p>
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
            </form>
    </section>
</main>
</body>
</html>