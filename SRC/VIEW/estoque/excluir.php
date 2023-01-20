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
</body>
</html>