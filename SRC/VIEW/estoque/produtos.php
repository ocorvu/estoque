<?php
use ocorvu\Estoque\Controller\EstoqueController;
use ocorvu\Estoque\Model\Acesso;

session_start();

Acesso::notLogged();

?>

<body>
<header>
    <h1 class="title mb-10 center">
        <a class="link" href="/produtos">ESTOQUE</a>
    </h1>
    <nav class="w-100">
        <ul class="flex mb-10 w-100">
            <div class="flex">
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
            </div>
            <div>
                <li>
                    <a class="link" href="/admin/painel">
                        <img src="<?= asset('IMAGES/admin.png') ?>" alt="icone admin">PAINEL</a></li>
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
        <form action="/produtos" method="GET">
        
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
                                    formaction='/produtos/detalhes' 
                                    value='<?= $coluna['id']; ?>'
                                    title='Detalhes'
                                >
                                <button
                                    class="modificar"
                                    name='id'
                                    type='submit'
                                    formaction='/produtos/modificar'
                                    value='<?= $coluna['id']; ?>' 
                                    title='Modificar' 
                                >
                                <button
                                    class="excluir"
                                    name='id'
                                    type='submit'
                                    formaction='/produtos/excluir' 
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
</body>
</html>