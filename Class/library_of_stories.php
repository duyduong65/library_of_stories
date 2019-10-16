<?php
include_once "DBConnect.php";
include_once "Stories.php";

class library_of_stories
{
    protected $connect;

    public function __construct()
    {
        $db = new DBConnect("mysql:host=localhost;dbname=library_of_stories", "root", "khongbiet1");
        $this->connect = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM stories";
        $stmt = $this->connect->query($sql);
        $stmt->execute();
        $stmt = $stmt->fetchAll();
        $stories = [];
        foreach ($stmt as $value) {
            $story = new Stories($value['name'], $value['author'], $value['category']);
            array_push($stories, $story);
        }
        return $stories;
    }

}

$manager = new library_of_stories();