<?php


namespace App\Controller;

use App\Model\Author;
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

    public function callDelete($id)
    {
        $id=$_REQUEST['id'];
        $author = $this->authorModel->delete($id);
        header('location: index.php');
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'app/View/author/create.php';
        } else {
            // Validate dữ liệu
            $errors = [];
            $fields = ['first-name', 'last-name', 'email', 'birthdate'];

            foreach ($fields as $field) {
                if (empty($_POST[$field])) {
                    $errors[$field] = 'Không được để trống';
                }
            }
            if (empty($errors)) {
                $firstName = $_REQUEST['first-name'];
                $LastName = $_REQUEST['last-name'];
                $email = $_REQUEST['email'];
                $birthdate = $_REQUEST['birthdate'];
                $authors = new Author($firstName, $LastName, $email, $birthdate);
//                var_dump($author);
                $this->authorModel->create($authors);
                header('Location: index.php');
            } else {
                include 'app/View/author/create.php';
            }
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $this->authorModel->getById($id);
            include 'app/View/author/update.php';
        } else {

            // Validate dữ liệu
            $errors = [];
            $fields = ['first-name', 'last-name', 'email', 'birthdate'];

            foreach ($fields as $field) {
                if (empty($_POST[$field])) {
                    $errors[$field] = 'Không được để trống';
                }
            }

            $id = $_POST['id'];
            if (empty($errors)) {
                $author = new Author($_POST['first-name'], $_POST['last-name'], $_POST['email'], $_POST['birthdate']);
                $this->authorModel->update($id,$author);
                header('Location: index.php');
            } else {
                $this->authorModel->getById($id);
                include 'app/View/author/update.php';
            }
        }
    }
}