<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$rotas = [
    '/' => 'index.view.php',
    '/produtos' => './SRC/VIEW/estoque/produtos.php',
    '/produtos/cadastrar' => './SRC/VIEW/estoque/cadastrar.php',
    '/produtos/detalhes' => './SRC/VIEW/estoque/detalhes.php',
    '/produtos/detalhes' => './SRC/VIEW/estoque/detalhes.php',
    '/admin/painel' => './SRC/VIEW/admin/painelAdmin.php',
    '/admin/usuarios' => './SRC/VIEW/admin/usuarios.php',
    '/admin/usuarios/cadastrar' => './SRC/VIEW/admin/registro.php',

];

if (array_key_exists($uri, $rotas)) {
    require $rotas[$uri];
} else {
    http_response_code(404);
    echo "<h1 style='text-align:center;'>404</h1>";
}