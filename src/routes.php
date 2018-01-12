<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Src\Book;

// add book into book instance
$book = new Book();
$book->add([
    'id' => 1,
    'title' => 'Harry Potter 1',
    'price' => 10000,
    'serial_number' => 'AHDNSKNAA12301',
    'release_year' => 2015
])
->add([
    'id' => 2,
    'title' => 'Harry Potter 1',
    'price' => 10000,
    'serial_number' => 'AHDNSKNAA12301',
    'release_year' => 2015
]);

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

/**
 * Get All Book
 */
$app->get('/books', function (Request $request, Response $response, array $args) use ($book) {
    $jsonResponse = $response->withJson($book->find());
    return $jsonResponse;
});

/**
 * Get Spesifik Book
 */
$app->get('/books/{id}', function (Request $request, Response $response, array $args) use ($book) {
    $jsonResponse = $response->withJson($book->findOne($args['id']));
    return $jsonResponse;
});


