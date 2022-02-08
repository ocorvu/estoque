<?php
use ocorvu\Estoque\Controller\EstoqueController;
use ocorvu\Estoque\Model\Acesso;

require_once '../../../vendor/autoload.php';

session_start();

Acesso::notLogged();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque - Visualizar</title>
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
            <div class="flex">
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
            </div>
            <div>
                <li>
                    <a class="link" href="../admin/painelAdmin.php"><img src="../../../public/IMAGES/admin.png" alt="icone admin">ADMIN</a></li>
            </div>
        </ul>
    </nav>
</header>
<main class="w-100">
    <section class="m-auto w-80">
        <h2 class="mb-10 center">PRODUTOS EM ESTOQUE</h2>
        <p class="mb-10">
            Digite a descrição do produto para uma busca específica:
        </p>
        <form action="index.php" method="GET">
        
            <input class="w-100" type="text" name='nDescricao' id="iDescricao" size="20" maxlength="30" placeholder="Descrição do produto">
        
            <button class="btn m-auto" type="submit">Buscar</button>
        </form>
    </section>
    <section>
        <table class="w-100 center">
            <thead>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php
                $produtos = new EstoqueController();
                if (!empty($_GET['nDescricao'])) {
                    $produtos = $produtos->listarProdutos($_GET['nDescricao']);
                } else {
                    $produtos = $produtos->listarProdutos();
                }

                foreach ($produtos as $linha => $coluna) { ?>
                    <tr>
                        <td><?= $coluna['descricao']; ?></td>
                        <td><?= $coluna['quantidade']; ?></td>
                        <td id="acoes">
                            <form mehtod='GET'>
                                <button
                                    class="detalhes"
                                    name='id'
                                    type='submit'
                                    formaction='detalhes.php' 
                                    value='<?= $coluna['id']; ?>'
                                    title='Detalhes'
                                >
                                <button
                                    class="modificar"
                                    name='id'
                                    type='submit'
                                    formaction='modificar.php'
                                    value='<?= $coluna['id']; ?>' 
                                    title='Modificar' 
                                >
                                <button
                                    class="excluir"
                                    name='id'
                                    type='submit'
                                    formaction='excluir.php' 
                                    value='<?= $coluna['id']; ?>' 
                                    title='Excluir' 
                                >
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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