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
        $authors = $this->authorModel->getAll();
        include_once 'app/View/author/list.php';
    }
}