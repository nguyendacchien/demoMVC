<?php


namespace App\Model;

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
            die($stmt->fetchAll());
            return $stmt->fetchAll();
        }catch (\PDOException $exception){
            die($exception->getMessage());
        }

    }

    //Lấy ra Author theo id
    public function getById($id)
    {

    }

    //Tạo Author
    public function create($request)
    {

    }

    //Cập nhật thông tin Author
    public function update($author)
    {

    }

    //Xoá Author theo id
    public function delete($id)
    {

    }

    public function convertToObject($data)
    {

    }
}