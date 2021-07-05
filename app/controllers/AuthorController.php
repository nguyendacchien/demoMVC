<?php


namespace App\Controller;
use App\Model\AuthorModel;

class AuthorController
{
    protected $authorModel;
    public function __construct()
    {
        $this->authorModel = new AuthorModel();
    }

    public function showAllAuthors()
    {
        die("test");
        $authors = $this->authorModel->getAll();
        include_once 'app/views/author/list.php';
    }
}