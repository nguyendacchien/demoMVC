<?php

//die(__DIR__.'/vendor/autoload.php');
require __DIR__ . '/vendor/autoload.php';
use App\Controller\AuthorController;

try {
    $controller = new AuthorController();
    $controller->showAllAuthors();
}catch (Exception $exception){
    echo $exception->getMessage();
}

