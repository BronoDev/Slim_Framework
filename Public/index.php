<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

/* Padrão PSR7 */
$app->get('/postagens', function (Request $request, Response $response) {
    /* Escreve no corpo da resposta utilizando o padrão PSR7 */
    $response->getBody()->write("Listagem de postagens");

    return $response;
});

/* 
Tipos de requisição ou Verbos HTTP

get -> Recuperar recursos do servidor (Select)
post -> Criar dado no servidor (Insert)
put -> Atualizar dados no servidor (Update)
delete -> Deletar dados do servidor (Delete)

*/

$app->delete('/usuarios/remove/{id}', function (Request $request, Response $response) {
    
    $id = $request->getAttribute('id');

    /*
    Deletar do banco de dados com DELETE..
    */

    return $response->getBody()->write("Sucesso ao deletar: " . $id);

});

$app->put('/usuarios/atualiza', function (Request $request, Response $response) {
    //recuperar post($_POST)
    $post = $request->getParsedBody();
    $id = $post['id'];
    $nome = $post['nome'];
    $email = $post['email'];

    /*
    Salvar no banco de dados com INSERT INTO..
    */

    return $response->getBody()->write("Sucesso ao atualizar: " . $id);

});

$app->post('/usuarios/adiciona', function (Request $request, Response $response) {
    //recuperar post($_POST)
    $post = $request->getParsedBody();
    $nome = $post['nome'];
    $email = $post['email'];

    /*
    Salvar no banco de dados com INSERT INTO..
    */

    return $response->getBody()->write("Sucesso");

});

$app->run();

/*
$app->get('/postagens2', function () {
    echo "Listagem de postagens";
});

$app->get('/usuarios[/{id}]', function ($request, $response) {
    $id = $request->getAttribute('id');
    echo "Listagem de usuarios ou ID: " . $id;
});

$app->get('/postagens[/{ano}[/{mes}]]', function ($request, $response) {
    $ano = $request->getAttribute('ano');
    $mes = $request->getAttribute('mes');
    echo "Listagem de postagens " . " Ano: " . $ano . " Mes: " . $mes;
});

$app->get('/lista/{itens:.*}', function ($request, $response) {
    $itens = $request->getAttribute('itens');

    var_dump(explode("/", $itens));

});

$app->get('/blog/postagens/{id}', function ($request, $response) {
    echo "Listar postagem para um ID";
})->setName("blog");

$app->get('/meusite', function ($request, $response) {
    $retorno = $this->get("router")->pathFor("blog", ["id" => "5"]);
    echo $retorno;
});


$app->group('/v1', function () {
    $this->get('/usuarios', function () {
        echo "Listagem de usuarios";
    });

    $this->get('/postagens', function () {
        echo "Listagem de postagens";
    });
});
*/