<?php


namespace App\Model;

use PDO;

class AuthorModel //CRUD with Database
{
    private $dbConnect;
    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }

    //Lấy ra toàn bộ Author
    public function getAll()
    {
        try {
            $sql = "SELECT * FROM `authors`";
            $stmt = $this->dbConnect->connect()->query($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $this->convertToObject($data);
        }catch (\PDOException $exception){
            die($exception->getMessage());
        }

    }

    //Lấy ra Author theo id
    public function getById($id)
    {
        $authors = $this->getAll();
        foreach ($authors as $author){
            if ($author->getID()==$id){
                return $author;
            }
        }
    }

    //Tạo Author
    public function create($author)
    {
//        echo "<pre>";
//        var_dump($author);
//        die();
        $sql = "INSERT INTO authors (first_name, last_name, email, birthdate) VALUES (?, ?, ?, ?)";
        $stmt = $this->dbConnect->connect()->prepare($sql);
        $stmt->bindParam(1, $author->getFirstName());
        $stmt->bindParam(2, $author->getLastName());
        $stmt->bindParam(3, $author->getEmail());
        $stmt->bindParam(4, $author->getBirthdate());
        $stmt->execute();
    }

    //Cập nhật thông tin Author
//    public function update($id, $author)
//    {

//        $sql = "UPDATE customers SET first_name = ?, last_name, email = ?, birthdate = ? WHERE id = ?";
//        $stmt = $this->dbConnect->connect()->prepare($sql);
//        $stmt->bindParam(1, $author->first_name);
//        $stmt->bindParam(2, $author->last_name);
//        $stmt->bindParam(3, $author->email);
//        $stmt->bindParam(4, $author->birthdate);
//        $stmt->bindParam(5, $id);
//        return $stmt->execute();



//        $sql = "UPDATE authors SET `first_name`=:fn, `last_name`=:ln, `email`=:email, `birthdate`=:dob
//        where `id`=". $id;
//        $stmt = $this->dbConnect->connect()->prepare($sql);
//        $stmt->bindParam(":fn", $author->getFirstName());
//        $stmt->bindParam(":ln", $author->getLastName());
//        $stmt->bindParam(":email", $author->getEmail());
//        $stmt->bindParam(":dob", $author->getBirthdate());
//        $stmt->execute();
//    }

    //Xoá Author theo id
    public function delete($id)
    {
        $sql = "DELETE FROM `authors` WHERE id =".$id;
        $stmt = $this->dbConnect->connect()->query($sql);
        $stmt->execute();

    }

    public function convertToObject($data)
    {
        $authors = [];
        foreach ($data as $item){
            $author = new Author($item->first_name, $item->last_name, $item->email, $item->birthdate);
            $author->setId($item->id);
            array_push($authors, $author);
        }
        return $authors;
    }
}