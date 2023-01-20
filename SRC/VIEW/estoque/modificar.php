<?php

use ocorvu\Estoque\Controller\EstoqueController;
use ocorvu\Estoque\Model\Acesso;

require_once '../../../vendor/autoload.php';
session_start();

Acesso::notLogged();

if ($_SESSION['nivel'] == 1) {
    header("location: ./index.php");
}

$produtos = new EstoqueController();
if (!empty($_POST)) {
    $produtos->alterar(
        $_POST['id'], 
        $_POST['descricao'], 
        $_POST['quantidade']
    );
}

?>

<body>
<header>
        <h1 class="title mb-10 center"><a class="link" href="index.php">ESTOQUE</a></h1>
        <nav>
            <ul class="flex mb-10">
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
        <h2 class="mb-10 center">MODIFICAR PRODUTO</h2>
        <p class="mb-10">
            Preencha os campos que deseja alterar:
        </p>

        <table class="w-100 center">
            <thead>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php
                $produtos = new EstoqueController();
                $produto = $produtos->listarProdutos(null, $_GET['id']);
                foreach ($produto as $linha => $coluna) { ?>
                    <tr>
                        <td><?= $coluna['descricao'] ?></td>
                        <td><?= $coluna['quantidade'] ?></td>
                        <td id="acoes">
                        <form mehtod='GET'>
                            <button
                                class="detalhes"
                                name='id'
                                type='submit'
                                formaction='detalhes.php' 
                                value='<?= $coluna['id'] ?>'
                                title='Detalhes'
                            >
                            <button 
                                class="modificar"
                                name='id'
                                type='submit'
                                formaction='modificar.php'
                                value='<?= $coluna['id'] ?>' 
                                title='Modificar' 
                            >
                            <button 
                                class="excluir"
                                name='id'
                                type='submit'
                                formaction='excluir.php' 
                                value='<?= $coluna['id'] ?>' 
                                title='Excluir' 
                            >
                        </form>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <form action="" method="POST">
        
        <?php 
        $produto = $produtos->listarProdutos(null, $_GET['id']);
        foreach ($produto as $linha => $coluna) { ?>
            
            <label for="iDescricao">Descrição</label>
            <input 
                class="w-100" 
                type="text" 
                name='descricao' 
                id="iDescricao" 
                size="20" 
                maxlength="30" 
                value='<?php echo $coluna['descricao'] ?>'
            >

            <label for="iQuantidade">Quantidade</label>
            <input 
                class="w-100" 
                type="number" 
                name='quantidade' 
                id="iQuantidade" 
                size="20" 
                maxlength="30" 
                value='<?php echo $coluna['quantidade'] ?>' 
            >
            <?php } ?>
        
            <div class="center mb-10">
                <button
                    class="btn inline"
                    type="submit"
                    formaction="./index.php"
                >
                    Voltar
                </button>
                <button 
                    class="btn inline"
                    name="id" 
                    type="submit"
                    value="<?= $_GET['id'] ?>"
                >
                    Modificar
                </button>
            </div>
        </form>
    </section>
</main>
</body>
</html>