<?php

use ocorvu\Estoque\Controller\EstoqueController;
use ocorvu\Estoque\Model\Acesso;

session_start();

Acesso::notLogged();

if (!empty($_POST)) {
    $cadastro = new EstoqueController();
    $cadastrou = $cadastro->cadastrar($_POST['nDescricao'], $_POST['nQuantidade']);
}
?>

<body>
<header>
    <h1 class="title mb-10 center">
        <a class="link" href="/produtos">ESTOQUE</a>
    </h1>
    <nav class="w-100">
        <ul class="flex mb-10 w-100">
            <li>
                <a class="link" href="/produtos/cadastrar">
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
    <h2 class="mb-10 center">Cadastre o Produto</h2>

    <?php if ($cadastrou[0] === true) { ?>
        <p class="sucesso center">Produto <?= $cadastrou[1] ?> cadastrado com sucesso!</p>
    <?php }else if ($cadastrou[0] === false) { ?>
        <p class="erro center">O Produto <?= $cadastrou[1] ?> já se encontra cadastrado!</p>
    <?php } ?>
    <form 
        class="w-80 m-auto" 
        action="" 
        method="POST"
    >
        <label for="iDescricao">Descrição</label>
        <input 
            class="w-100" 
            type="text" 
            name='nDescricao' 
            id="iDescricao" 
            size="30" 
            maxlength="30" 
            placeholder="Derby, Dunhill, Malboro..." 
            required 
        />
        <label for="iQuantidade">Quantidade</label>
        <input 
            class="w-100" 
            type="number" 
            name="nQuantidade" 
            id="iQuantidade" 
            min="0" 
            placeholder="10" 
            required
        />
        <button class="btn m-auto" type="submit">Cadastrar</button>
    </form>
</main>
</body>
</html>